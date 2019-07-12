<?php

class ContactPageSection extends ModelAdmin {

	private static $managed_models = array(
        'ContactDetails'
    );

    private static $url_segment = 'ContactDetails';

    private static $menu_title = 'Contact Emails';

   
}
