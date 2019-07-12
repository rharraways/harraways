<?php


/**
 * Improved GridFieldExportButton that streams CSV data to the client instead of building
 * the entire CSV in memory and sending that (which doesn't work for large data sets).
 */
class GridFieldStreamExportButton extends GridFieldExportButton
{
    /**
     * Modified export code to stream a CSV instead of SilverStripe's "build and
     * send" approach, which is memory constrained
     *
     * @param GridField $gridField
     * @param SS_HTTPRequest $request
     * @return void
     */
    public function handleExport($gridField, $request = null)
    {
        $headers = [];
        $fieldMap = $this->exportColumns ?: singleton($gridField->getModelClass())->summaryFields();

        // Map source names to display names
        // If a field is callable (e.g. anonymous function) then use the source name as the header
        foreach ($fieldMap as $columnSource => $columnHeader) {
            if (!is_string($columnHeader) && is_callable($columnHeader)) {
                $headers[] = $columnSource;
            } else {
                $headers[] = $columnHeader;
            }
        }

        $this->streamCsv($gridField, $headers, $fieldMap);
    }

    /**
     * Generate an stream a CSV file to the browser, without creating it all in memory first
     *
     * @param GridField $gridField
     * @param array $headers
     * @param array $fieldMap
     */
    public function streamCsv(GridField $gridField, array $headers, array $fieldMap)
    {
        $exportName = $this->getExportFilename($gridField->getModelClass());

        header("Content-Type: text/csv");
        header("Content-Disposition: attachment; filename=\"{$exportName}\"");

        // DataList iterates by loading all rows into memory
        // This doesn't work with huge numbers of records, so we iterate over query results manually here
        /** @var SQLQuery $query */
        $class = $gridField->getModelClass();
        $query = $gridField->getList()
            ->limit(0)
            ->dataQuery()
            ->query();

        // Open and output headers
        $stream = fopen('php://output', 'w');
        fputcsv($stream, $headers);

        foreach ($query->execute() as $row) {
            $record = new $class($row);
            fputcsv($stream, $this->mapRecordToCsvRow($record, $fieldMap, $gridField));
        }

        fclose($stream);
        die();
    }

    /**
     * @param DataObject $item
     * @param array $fieldMap
     * @param GridField $gridField
     * @return array
     */
    protected function mapRecordToCsvRow(DataObject $item, array $fieldMap, GridField $gridField)
    {
        $row = [];

        foreach ($fieldMap as $columnSource => $columnHeader) {
            if (!is_string($columnHeader) && is_callable($columnHeader)) {
                if ($item->hasMethod($columnSource)) {
                    $relObj = $item->{$columnSource}();
                } else {
                    $relObj = $item->relObject($columnSource);
                }

                $row[] = $columnHeader($relObj);
            } else {
                $row[] = $gridField->getDataFieldValue($item, $columnSource);
            }
        }

        return $row;
    }

    /**
     * @return string
     */
    protected function getExportFilename($modelClass)
    {
        $now = Date("d-m-Y-H-i");
        return "export-$modelClass-$now.csv";
    }
}
