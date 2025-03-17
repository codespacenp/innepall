<?php require_once( '../css/cms.php' ); ?>
<cms:template title='Plans' parent='_hosting_' icon='list-rich' clonable='1' dynamic_folders='0' has_subtemplates='1' subtpl_selector_label='Plans Type' subtpl_selector_is_advanced='0' >
<!-- Config Starts -->
    <cms:config_form_view>
        <cms:field 'k_page_title' label='Plan Name' order='0' />
        <cms:field 'k_page_name' group='_advanced_settings_' />
    </cms:config_form_view>
    <cms:editable label='Page hits' name='page_hits' type='text' search_type='integer' group='_advanced_settings_' order='100' />
    <cms:config_list_view orderby='weight' order='desc' exclude='default-page-for-hosting-plans-php' searchable='1'>
        <cms:field 'k_selector_checkbox' />
        <cms:field 'k_page_title' header='Plans' />
        <cms:field 'k_up_down' />
        <cms:field 'k_actions' />
    </cms:config_list_view>
<!-- Config Ends -->
<!-- Common Items Starts -->
    <cms:editable name='common_selector_group' label='Common Fields' type='group' order='1' collapsed='0'> 
        <cms:editable name='common_selector_row' type='row' order='1'>
            <cms:editable name='slogan' label='Slogan' type='text' order='1' searchable='10' search_type='text' class='col-md-4' />
            <cms:editable name='recommended' label='Recommanded Product' type='single_check' opt_values='Yes' search_type='integer' order='15' class='col-md-2' />
            <cms:editable name='price' label='Price' desc='number' type='text' search_type='decimal' order='20' class='col-md-2' />
            <cms:editable name='duration' label='Duration' desc='Daily/Monthly/Yearly/Triennially' type='relation' has='one' searchable='0' order='30' orderby='page_name' order_dir='asc' create_auto='1' show_manage='1' advanced_gui='1' class='col-md-4'  />
            <cms:editable name='plans_companies' label='Company' type='relation' has='one' searchable='0' order='40' masterpage='hosting/companies.php' advanced_gui='1' orderby='page_name' order_dir='asc' show_manage='1' class='col-md-4' />
            <cms:editable name='plans_services' label='Service Type' type='relation' has='one' searchable='0' order='50' masterpage='hosting/services.php' advanced_gui='1' orderby='page_name' order_dir='asc' show_manage='1' class='col-md-4' />            
            <cms:editable name='url' label='URL' type='text' order='60' searchable='0' search_type='text' desc='Link to the plans.' class='col-md-4' />
        </cms:editable>
    </cms:editable>
<!-- Common Items Ends -->
<!-- Common Subtemplate Starts -->
    <cms:sub_template name='@common'>
        <cms:stub name='common_selector_group' />
        <cms:stub name='common_selector_row' />
        <cms:stub name='slogan'  />
        <cms:stub name='recommended' />
        <cms:stub name='price' filter='slider' />
        <cms:stub name='duration' />        
        <cms:stub name='plans_companies' />
        <cms:stub name='plans_services' />
        <cms:stub name='url' />
    </cms:sub_template>    
<!-- Common Subtemplate Ends -->
<!-- Hosting Common Fields Starts-->
    <cms:editable name='hosting_common_group' label='Hosting Common' type='group' order='5' collapsed='0' >
        <cms:editable name='hosting_common_row' type='row' order='10'>
            <cms:editable name='cpu' label='CPU, Core' desc='Number of Core' type='relation' has='one' searchable='0' order='90' orderby='page_name' order_dir='asc' create_auto='1' show_manage='1' advanced_gui='1' class='col-md-4'  />
            <cms:editable name='memory' label='Memory, GB' desc='RAM Memory' type='relation' has='one' searchable='0' order='100' orderby='page_name' order_dir='asc' create_auto='1' show_manage='1' advanced_gui='1' class='col-md-4'  />
            <cms:editable name='control_panel' label='Control Panel' desc='Webhosting control panel.' type='relation' has='one' searchable='0' order='110' orderby='page_name' order_dir='asc' create_auto='1' advanced_gui='1' show_manage='1' class='col-md-4' />
        </cms:editable>        
        <cms:editable name='disk_space_row' type='row' order='20'>
            <cms:editable name='disk_space_type' label='Disk Space Type' desc='Type of disk space' opt_values='NVMe SSD | SSD | HDD' order='10' opt_selected='SSD' type='radio' class='col-md-4' />
            <cms:editable name='disk_space' label='Disk Space' desc='Amount of storage allotted to your hosting account.' opt_values='Unlimited=unlimited | Limited=limited' order='20' opt_selected='unlimited' type='radio' class='col-md-4' />
            <cms:func _into='disk_space_cond' disk_space=''>
                <cms:if disk_space='unlimited'>hide<cms:else />show</cms:if>
            </cms:func>
            <cms:editable name='disk_space_limit' label='Disk Space, GB' desc='Only Number' type='text' not_active=disk_space_cond  search_type='decimal' order='25' class='col-md-4' />
        </cms:editable>
        <cms:editable name='bandwidth_row' type='row' order='30'>
            <cms:editable name='bandwidth' label='Monthly Data Transfers' desc='Data that is transferred within a month.' opt_values='Unlimited=unlimited | Unmetered=unmetered | Limited=limited' order='30' opt_selected='unlimited' type='radio' class='col-md-4' />
            <cms:func _into='bandwidth_cond' bandwidth=''>
                <cms:if bandwidth='limited'>show<cms:else />hide</cms:if>
            </cms:func>
            <cms:editable name='bandwidth_limit' label='Bandwidth, TB' desc='Only Number' type='text' not_active=bandwidth_cond  search_type='decimal' order='35' class='col-md-4' />
        </cms:editable>        
    </cms:editable>
<!-- Hosting Common Fields Ends -->    
<!--Web Hosting Details Starts -->
    <cms:editable name='hosting_detail_group' label='Hosting Detail' type='group' order='10' collapsed='0'>
        <cms:editable name='websites_row' type='row' order='40'>
            <cms:editable name='websites' label='Websites' desc='Amount of websites you can build.' opt_values='Unlimited=unlimited | Limited=limited' order='40' opt_selected='unlimited' type='radio' class='col-md-4' />
            <cms:func _into='websites_cond' websites=''>
                <cms:if websites='unlimited'>hide<cms:else />show</cms:if>
            </cms:func>
            <cms:editable name='websites_limit' label='No. of Websites' desc='Only Number' type='text' not_active=websites_cond search_type='integer' order='45' class='col-md-4' />
        </cms:editable>
        <cms:editable name='email_row' type='row' order='50'>
            <cms:editable name='email' label='Email Accounts' desc='Email mailbox server owned by you.' opt_values='Unlimited=unlimited | Limited=limited' order='50' opt_selected='unlimited' type='radio' class='col-md-4' />
            <cms:func _into='email_cond' email=''>
                <cms:if email='unlimited'>hide<cms:else />show</cms:if>
            </cms:func>
            <cms:editable name='email_limit' label='No. of Email Account' desc='Only Number' type='text' not_active=email_cond search_type='integer' order='55' class='col-md-4' />
        </cms:editable>
        <cms:editable name='subdomain_row' type='row' order='60'>
            <cms:editable name='subdomain' label='Subdomains' desc='Part of main domain.' opt_values='Unlimited=unlimited | Limited=limited' order='60' opt_selected='unlimited' type='radio' class='col-md-4' />
            <cms:func _into='subdomain_cond' subdomain=''>
                <cms:if subdomain='unlimited'>hide<cms:else />show</cms:if>
            </cms:func>
            <cms:editable name='subdomain_limit' label='No. of Subdomains' desc='Only Number' type='text' not_active=subdomain_cond search_type='integer' order='65' class='col-md-4' /> 
        </cms:editable>
        <cms:editable name='parked_domain_row' type='row' order='70'>
            <cms:editable name='parked_domain' label='Parked Domains' desc='Multiple domain for main domain.' opt_values='Unlimited=unlimited | Limited=limited' order='70' opt_selected='unlimited' type='radio' class='col-md-4' />
            <cms:func _into='parked_domain_cond' parked_domain=''>
                <cms:if parked_domain='unlimited'>hide<cms:else />show</cms:if>
            </cms:func>
            <cms:editable name='parked_domain_limit' label='No. of Parked Domains' desc='Only Number' type='text' not_active=parked_domain_cond search_type='integer' order='75' class='col-md-4' />
        </cms:editable>
        <cms:editable name='databases_row' type='row' order='80'>
            <cms:editable name='databases' label='Databases' desc='Number of Databases' opt_values='Unlimited=unlimited | Limited=limited' order='80' opt_selected='unlimited' type='radio' class='col-md-4' />
            <cms:func _into='databases_cond' databases=''>
                <cms:if databases='unlimited'>hide<cms:else />show</cms:if>
            </cms:func>
            <cms:editable name='databases_limit' label='No. of Databases' desc='Only Number' type='text' not_active=databases_cond search_type='integer' order='85' class='col-md-4' />
        </cms:editable>
    </cms:editable>   
    <!-- Account Specifications -->
    <cms:editable name='account_spec_group' label='Account Specifications' type='group' order='20' collapsed='0' >
        <cms:editable name='account_spec_row' type='row' order='90'>                       
            <cms:editable name='io' label='IO, MB/s' desc='Input/Output Operation' type='relation' has='one' searchable='0' order='110' orderby='page_name' order_dir='asc' create_auto='1' show_manage='1' advanced_gui='1' class='col-md-4'  />
            <cms:editable name='iops' label='IOPS, No.' desc='Input/Output per Second' type='relation' has='one' searchable='0' order='120' orderby='page_name' order_dir='asc' create_auto='1' show_manage='1' advanced_gui='1' class='col-md-4'  />
            <cms:editable name='entry_process' label='Entry Process, No.' desc='Number of Entry Process' type='relation' has='one' searchable='0' order='130' orderby='page_name' order_dir='asc' create_auto='1' show_manage='1' advanced_gui='1' class='col-md-4'  />
            <cms:editable name='nproc' label='Active Process, No.' desc='Number of process currently actively running' type='relation' has='one' searchable='0' order='140' orderby='page_name' order_dir='asc' create_auto='1' show_manage='1' advanced_gui='1' class='col-md-4'  />
            <cms:editable name='inodes' label='Inodes' desc='Number of Inodes' type='relation' has='one' searchable='0' order='150' orderby='page_name' order_dir='asc' create_auto='1' show_manage='1' advanced_gui='1' class='col-md-4'  />
            <cms:editable name='php_memory' label='PHP Memory, GB' desc='PHP Memory Allowed' type='relation' has='one' searchable='0' order='160' orderby='page_name' order_dir='asc' create_auto='1' show_manage='1' advanced_gui='1' class='col-md-4'  />
            <cms:editable name='database_connections' label='Database Connections' desc='Max Database User Connections' type='relation' has='one' searchable='0' order='170' orderby='page_name' order_dir='asc' create_auto='1' show_manage='1' advanced_gui='1' class='col-md-4'  />
            <cms:editable name='hosted_accounts' label='Hosted Accounts per Server' desc='No. Of Accounts Hosted Per Server' type='relation' has='one' searchable='0' order='180' orderby='page_name' order_dir='asc' create_auto='1' show_manage='1' advanced_gui='1' class='col-md-4'  />
            <cms:editable name='backup' label='Backup, Days/Weeks/Months' desc='Backup Service' type='relation' has='one' searchable='0' order='190' orderby='page_name' order_dir='asc' create_auto='1' show_manage='1' advanced_gui='1' class='col-md-4'  />
        </cms:editable>
    </cms:editable>
    <!-- Email Specifications -->
    <cms:editable name='email_spec_group' label='Email Specifications' type='group' order='30' collapsed='0' >
        <cms:editable name='email_spec_row' type='row' order='200'>
            <cms:editable name='mailbox_size' label='Mailbox Size, GB' desc='Max Mailbox Size' type='relation' has='one' searchable='0' order='10' orderby='page_name' order_dir='asc' create_auto='1' show_manage='1' advanced_gui='1' class='col-md-4' />
            <cms:editable name='max_email_allowed' label='Email Allowed per Hour' desc='Maximum Email allowed per hour' type='relation' has='one' searchable='0' order='10' orderby='page_name' order_dir='asc' create_auto='1' show_manage='1' advanced_gui='1' class='col-md-4' />
            <cms:editable name='email_size' label='Max Email Size, MB' desc='Maximum size of email allowed.' type='relation' has='one' searchable='0' order='20' orderby='page_name' order_dir='asc' create_auto='1' show_manage='1' advanced_gui='1' class='col-md-4' />        
        </cms:editable>
        <cms:editable name='other_email_spec_row' type='row' order='210'>
            <cms:editable name='email_portocol' label='Email Portocol(POP, SMTP, IMAP)' type='single_check' opt_values='Yes' search_type='integer' order='30' class='col-md-2' />
            <cms:editable name='web_based_email' label='Web Based Email(RoundCube)' type='single_check' opt_values='Yes' search_type='integer' order='40' class='col-md-2' />
            <cms:editable name='catch_all_email' label='Catch All Email' type='single_check' opt_values='Yes' search_type='integer' order='50' class='col-md-2' />
            <cms:editable name='dns_record_modification' label='MX Record Modification' type='single_check' opt_values='Yes' search_type='integer' order='60' class='col-md-2' />
            <cms:editable name='email_grey_listing' label='Email Grey Listing' type='single_check' opt_values='Yes' search_type='integer' order='70' class='col-md-2' />
            <cms:editable name='email_forwarders' label='Email Forwarders' type='single_check' opt_values='Yes' search_type='integer' order='80' class='col-md-2' />
            <cms:editable name='email_aliases' label='Email Aliases' type='single_check' opt_values='Yes' search_type='integer' order='90' class='col-md-2' />
            <cms:editable name='email_auto_responders' label='Email Auto Responders' type='single_check' opt_values='Yes' search_type='integer' order='100' class='col-md-2' />
            <cms:editable name='email_filtering' label='Email Filtering' type='single_check' opt_values='Yes' search_type='integer' order='110' class='col-md-2' />
            <cms:editable name='email_anti_spam' label='Email Anti Spam' type='single_check' opt_values='Yes' search_type='integer' order='120' class='col-md-2' />
            <cms:editable name='email_virus_scanner' label='Email Virus Scanner' type='single_check' opt_values='Yes' search_type='integer' order='130' class='col-md-2' />
        </cms:editable>  
    </cms:editable>
    <!-- Security Specifications -->
    <cms:editable name='enhanced_security_group' label='Enhanced Security' type='group' order='40' collapsed='0' >
        <cms:editable name='enhanced_security_row' type='row' order='300'>
            <cms:editable name='patchman' label='Patchman' type='single_check' opt_values='Yes' search_type='integer' order='40' class='col-md-2' />
            <cms:editable name='imunify360' label='Imunify360' type='single_check' opt_values='Yes' search_type='integer' order='50' class='col-md-2' />
            <cms:editable name='support_cloudflare' label='Support Cloudflare' type='single_check' opt_values='Yes' search_type='integer' order='60' class='col-md-2' />
            <cms:editable name='web_application_firewall' label='Web Application Firewall' type='single_check' opt_values='Yes' search_type='integer' order='70' class='col-md-2' />
            <cms:editable name='antivirus_antimalware_scans' label='Antivirus & Antimalware Scans' type='single_check' opt_values='Yes' search_type='integer' order='80' class='col-md-2' />
            <cms:editable name='ssl_certificates' label='SSL Certificates' type='single_check' opt_values='Yes' search_type='integer' order='90' class='col-md-2' />
            <cms:editable name='dnssec' label='DNSSEC' type='single_check' opt_values='Yes' search_type='integer' order='100' class='col-md-2' />
            <cms:editable name='hosting_advisor' label='Hosting Advisor' type='single_check' opt_values='Yes' search_type='integer' order='110' class='col-md-2' />
            <cms:editable name='password_protected_directory' label='Password Protected Directory' type='single_check' opt_values='Yes' search_type='integer' order='120' class='col-md-2' />
        </cms:editable>
    </cms:editable>
    <!-- Enhanced Performance -->
    <cms:editable name='enhanced_performance_group' label='Enhanced Performance' type='group' order='50' collapsed='0' >
        <cms:editable name='enhanced_performance_row' type='row' order='400'>
            <cms:editable name='litespeed_webserver' label='LiteSpeed Webserver' type='single_check' opt_values='Yes' search_type='integer' order='40' class='col-md-2' />
            <cms:editable name='litespeed_cache' label='LiteSpeed Cache (LSCache)' type='single_check' opt_values='Yes' search_type='integer' order='50' class='col-md-2' />
            <cms:editable name='wordpress_management' label='WordPress Management' type='single_check' opt_values='Yes' search_type='integer' order='60' class='col-md-2' />
            <cms:editable name='wordpress_acceleration' label='WordPress Acceleration' type='single_check' opt_values='Yes' search_type='integer' order='70' class='col-md-2' />
            <cms:editable name='multi_datacenter' label='Multi Datacenter' type='single_check' opt_values='Yes' search_type='integer' order='80' class='col-md-2' />
        </cms:editable>
    </cms:editable>
    <!-- Domain -->
    <cms:editable name='domain_group' label='Domain' type='group' order='60' collapsed='0' >
        <cms:editable name='domain_row' type='row' order='500'>
            <cms:editable name='support_country_domains' label='Support Country Domains' type='single_check' opt_values='Yes' search_type='integer' order='40' class='col-md-2' />
            <cms:editable name='support_new_tld' label='Support New Top Level Domains' type='single_check' opt_values='Yes' search_type='integer' order='50' class='col-md-2' />
            <cms:editable name='support_international_domains' label='Support International Domains' type='single_check' opt_values='Yes' search_type='integer' order='60' class='col-md-2' />
            <cms:editable name='access_with_without_www' label='Access with and without "www"' type='single_check' opt_values='Yes' search_type='integer' order='70' class='col-md-2' />
        </cms:editable>
    </cms:editable>
    <!-- Website Management Features -->
    <cms:editable name='website_management_features_group' label='Website Management Features' type='group' order='70' collapsed='0' >
        <cms:editable name='website_management_features_row' type='row' order='600'>
            <cms:editable name='multi_php_version' label='Multi PHP Version' type='single_check' opt_values='Yes' search_type='integer' order='30' class='col-md-2' />
            <cms:editable name='password_protected_directory' label='Password Protected Directory' type='single_check' opt_values='Yes' search_type='integer' order='40' class='col-md-2' />
            <cms:editable name='web_based_file_manager' label='Web Based File Manager' type='single_check' opt_values='Yes' search_type='integer' order='50' class='col-md-2' />
            <cms:editable name='awstats_web_site_statistics' label='AWStats Web Site Statistics' type='single_check' opt_values='Yes' search_type='integer' order='60' class='col-md-2' />
            <cms:editable name='raw_log_accessing' label='Raw Log Accessing' type='single_check' opt_values='Yes' search_type='integer' order='70' class='col-md-2' />
            <cms:editable name='url_redirection' label='URL Redirection' type='single_check' opt_values='Yes' search_type='integer' order='80' class='col-md-2' />
            <cms:editable name='hotlink_protection' label='Hotlink Protection' type='single_check' opt_values='Yes' search_type='integer' order='90' class='col-md-2' />
            <cms:editable name='ip_deny_manager' label='IP Deny Manager' type='single_check' opt_values='Yes' search_type='integer' order='100' class='col-md-2' />
            <cms:editable name='preinstalled_scripts' label='Preinstalled Scripts' type='single_check' opt_values='Yes' search_type='integer' order='110' class='col-md-2' />
            <cms:editable name='backup_manager' label='Backup Manager' type='single_check' opt_values='Yes' search_type='integer' order='120' class='col-md-2' />
        </cms:editable>
    </cms:editable>
    <!-- Dev Tools -->
    <cms:editable name='dev_tools_group' label='Dev Tools' type='group' order='80' collapsed='0' >
        <cms:editable name='dev_tools_row' type='row' order='700'>
            <cms:editable name='ssh_access' label='SSH Access' type='single_check' opt_values='Yes' search_type='integer' order='10' class='col-md-2' />
            <cms:editable name='anycast_nameserver' label='Anycast Nameservers' type='single_check' opt_values='Yes' search_type='integer' order='20' class='col-md-2' />
            <cms:editable name='terminal_access' label='Terminal Access' type='single_check' opt_values='Yes' search_type='integer' order='30' class='col-md-2' />
            <cms:editable name='php_multiple_hardened_versions' label='PHP Multiple Hardened Versions' type='single_check' opt_values='Yes' search_type='integer' order='40' class='col-md-2' />
            <cms:editable name='php_composer' label='PHP Composer' type='single_check' opt_values='Yes' search_type='integer' order='50' class='col-md-2' />
            <cms:editable name='phpmyadmin' label='PHPMyAdmin' type='single_check' opt_values='Yes' search_type='integer' order='60' class='col-md-2' />
            <cms:editable name='git' label='Git' type='single_check' opt_values='Yes' search_type='integer' order='70' class='col-md-2' />
            <cms:editable name='website_importing' label='Website Importing' type='single_check' opt_values='Yes' search_type='integer' order='80' class='col-md-2' />
            <cms:editable name='mail_importing' label='Mail Importing' type='single_check' opt_values='Yes' search_type='integer' order='90' class='col-md-2' />
            <cms:editable name='wordpress_toolkit' label='WordPress Toolkit' type='single_check' opt_values='Yes' search_type='integer' order='100' class='col-md-2' />
        </cms:editable>
    </cms:editable>
    <!-- Server Software Features -->
    <cms:editable name='server_software_features_group' label='Server Software Features' type='group' order='90' collapsed='0' >
        <cms:editable name='server_software_features_row' type='row' order='800'>
            <cms:editable name='ruby' label='Ruby' type='single_check' opt_values='Yes' search_type='integer' order='40' class='col-md-2' />
            <cms:editable name='perl' label='Perl' type='single_check' opt_values='Yes' search_type='integer' order='50' class='col-md-2' />
            <cms:editable name='python' label='Python' type='single_check' opt_values='Yes' search_type='integer' order='60' class='col-md-2' />
            <cms:editable name='mysql' label='MySQL' type='single_check' opt_values='Yes' search_type='integer' order='70' class='col-md-2' />
            <cms:editable name='pear' label='Pear' type='single_check' opt_values='Yes' search_type='integer' order='80' class='col-md-2' />
            <cms:editable name='ssi' label='SSI' type='single_check' opt_values='Yes' search_type='integer' order='90' class='col-md-2' />
            <cms:editable name='cgi' label='CGI' type='single_check' opt_values='Yes' search_type='integer' order='100' class='col-md-2' />
            <cms:editable name='fastcgi' label='FastCGI' type='single_check' opt_values='Yes' search_type='integer' order='110' class='col-md-2' />
            <cms:editable name='custom_error_documents' label='Custom Error Documents' type='single_check' opt_values='Yes' search_type='integer' order='120' class='col-md-2' />
            <cms:editable name='javascript' label='Javascript' type='single_check' opt_values='Yes' search_type='integer' order='130' class='col-md-2' />
            <cms:editable name='gd_graphics_library' label='GD Graphics Library' type='single_check' opt_values='Yes' search_type='integer' order='140' class='col-md-2' />
            <cms:editable name='curl_library' label='cURL Library' type='single_check' opt_values='Yes' search_type='integer' order='150' class='col-md-2' />
            <cms:editable name='phpmyadmin' label='PHPMyAdmin' type='single_check' opt_values='Yes' search_type='integer' order='160' class='col-md-2' />
            <cms:editable name='http3_quic' label='HTTP/3(QUIC)' type='single_check' opt_values='Yes' search_type='integer' order='170' class='col-md-2' />
            <cms:editable name='nodejs' label='NodeJS' type='single_check' opt_values='Yes' search_type='integer' order='180' class='col-md-2' />
        </cms:editable>
    </cms:editable>
    <!-- WordPress Features -->
    <cms:editable name='wordpress_features_group' label='WordPress Features' type='group' order='100' collapsed='0' >
        <cms:editable name='wordpress_features_row' type='row' order='900'>
            <cms:editable name='wordpress_toolkit' label='WordPress Toolkit' type='single_check' opt_values='Yes' search_type='integer' order='40' class='col-md-2' />
            <cms:editable name='one_click_wordpress_installation' label='1 Click WordPress Installation' type='single_check' opt_values='Yes' search_type='integer' order='50' class='col-md-2' />
            <cms:editable name='litespeed_cache_lscwp' label='LiteSpeed Cache (LSCWP)' type='single_check' opt_values='Yes' search_type='integer' order='60' class='col-md-2' />
            <cms:editable name='wordpress_security_scan' label='WordPress Security Scan' type='single_check' opt_values='Yes' search_type='integer' order='70' class='col-md-2' />
            <cms:editable name='wordpress_security_patch' label='WordPress Security Patch' type='single_check' opt_values='Yes' search_type='integer' order='80' class='col-md-2' />
            <cms:editable name='wordpress_backup_restore' label='WordPress Backup & Restore' type='single_check' opt_values='Yes' search_type='integer' order='90' class='col-md-2' />
            <cms:editable name='clone_wordpress_site' label='Clone WordPress Site' type='single_check' opt_values='Yes' search_type='integer' order='100' class='col-md-2' />
        </cms:editable>
    </cms:editable>
    <!-- Guarantees -->
    <cms:editable name='guarantees_group' label='Guarantees' type='group' order='110' collapsed='0' >
        <cms:editable name='guarantees_row' type='row' order='1000'>
            <cms:editable name='full_money_back' label='Full Money Back' type='single_check' opt_values='Yes' search_type='integer' order='40' class='col-md-2' />
            <cms:editable name='network_uptime' label='99.9% Network Uptime' type='single_check' opt_values='Yes' search_type='integer' order='50' class='col-md-2' />
            <cms:editable name='server_uptime' label='99.5% Server Uptime' type='single_check' opt_values='Yes' search_type='integer' order='60' class='col-md-2' />
        </cms:editable>
    </cms:editable>
    <!-- Optional Add-Ons / Upgrades -->
    <cms:editable name='optional_addons_upgrades_group' label='Optional Add-Ons / Charges' type='group' order='120' collapsed='0' >
        <cms:editable name='optional_addons_upgrades_row' type='row' order='1100'>
            <cms:editable name='paid_ssl_certificate' label='Paid SSL Certificate' type='single_check' opt_values='Yes' search_type='integer' order='40' class='col-md-2' />
            <cms:editable name='free_ssl_certificate' label='FREE SSL Certificate' type='single_check' opt_values='Yes' search_type='integer' order='50' class='col-md-2' />
            <cms:editable name='activation_fee_free' label='Activation Fee Free' type='single_check' opt_values='Yes' search_type='integer' order='60' class='col-md-2' />
            <cms:editable name='hosting_migration_free' label='Hosting Migration Free' type='single_check' opt_values='Yes' search_type='integer' order='70' class='col-md-2' />
        </cms:editable>
    </cms:editable>
<!--Web Hosting Details Ends -->
<!-- Hosting Subtemplate Starts -->
    <cms:sub_template name='web_hosting' label='Web Hosting'>
        <cms:stub name='hosting_common_group' />
        <cms:stub name='hosting_common_row' />
        <cms:stub name='cpu' filter='slider' />
        <cms:stub name='memory' filter='slider' />
        <cms:stub name='control_panel' filter='dropdown' />        
        <cms:stub name='disk_space_row' />
        <cms:stub name='disk_space_type' filter='dropdown' />
        <cms:stub name='disk_space' filter='dropdown' />
        <cms:stub name='disk_space_limit' filter='slider' />
        <cms:stub name='bandwidth_row' />
        <cms:stub name='bandwidth' filter='dropdown' />
        <cms:stub name='bandwidth_limit' filter='slider' />
        <cms:stub name='hosting_detail_group' />        
        <cms:stub name='websites_row' />
        <cms:stub name='websites' filter='dropdown' />
        <cms:stub name='websites_limit' filter='slider' />
        <cms:stub name='email_row' />
        <cms:stub name='email' filter='dropdown' />
        <cms:stub name='email_limit' filter='slider' />
        <cms:stub name='subdomain_row' />
        <cms:stub name='subdomain' filter='dropdown' />
        <cms:stub name='subdomain_limit' filter='slider' />
        <cms:stub name='parked_domain_row' />
        <cms:stub name='parked_domain' filter='dropdown' />
        <cms:stub name='parked_domain_limit' filter='slider' />
        <cms:stub name='databases_row' />
        <cms:stub name='databases' filter='dropdown' />
        <cms:stub name='databases_limit' filter='slider' />
        <cms:stub name='account_spec_group' />
        <cms:stub name='account_spec_row' />             
        <cms:stub name='io' filter='slider' />
        <cms:stub name='iops' filter='slider' />
        <cms:stub name='entry_process' filter='slider' />
        <cms:stub name='nproc' filter='slider' />
        <cms:stub name='inodes' filter='slider' />
        <cms:stub name='php_memory' filter='slider' />
        <cms:stub name='database_connections' filter='slider' />
        <cms:stub name='hosted_accounts' filter='slider' />
        <cms:stub name='backup' filter='slider' />        
        <cms:stub name='email_spec_group' />
        <cms:stub name='email_spec_row' />
        <cms:stub name='mailbox_size' filter='slider' />
        <cms:stub name='max_email_allowed' filter='slider' />
        <cms:stub name='email_size' filter='slider' />
        <cms:stub name='other_email_spec_row' />
        <cms:stub name='email_portocol' filter='checkbox' />
        <cms:stub name='web_based_email' filter='checkbox' />
        <cms:stub name='catch_all_email' filter='checkbox' />
        <cms:stub name='dns_record_modification' filter='checkbox' />
        <cms:stub name='email_grey_listing' filter='checkbox' />
        <cms:stub name='email_forwarders' filter='checkbox' />
        <cms:stub name='email_aliases' filter='checkbox' />
        <cms:stub name='email_auto_responders' filter='checkbox' />
        <cms:stub name='email_filtering' filter='checkbox' />
        <cms:stub name='email_anti_spam' filter='checkbox' />
        <cms:stub name='email_virus_scanner' filter='checkbox' />
        <cms:stub name='enhanced_security_group' />
        <cms:stub name='enhanced_security_row' />
        <cms:stub name='patchman' filter='checkbox' />
        <cms:stub name='imunify360' filter='checkbox' />
        <cms:stub name='support_cloudflare' filter='checkbox' />
        <cms:stub name='web_application_firewall' filter='checkbox' />
        <cms:stub name='antivirus_antimalware_scans' filter='checkbox' />
        <cms:stub name='ssl_certificates' filter='checkbox' />
        <cms:stub name='dnssec' filter='checkbox' />
        <cms:stub name='hosting_advisor' filter='checkbox' />
        <cms:stub name='password_protected_directory' filter='checkbox' />
        <cms:stub name='enhanced_performance_group' />
        <cms:stub name='enhanced_performance_row' />
        <cms:stub name='litespeed_webserver' filter='checkbox' />
        <cms:stub name='litespeed_cache' filter='checkbox' />
        <cms:stub name='wordpress_management' filter='checkbox' />
        <cms:stub name='wordpress_acceleration' filter='checkbox' />
        <cms:stub name='multi_datacenter' filter='checkbox' />
        <cms:stub name='domain_group' />
        <cms:stub name='domain_row' />
        <cms:stub name='support_country_domains' filter='checkbox' />
        <cms:stub name='support_new_tld' filter='checkbox' />
        <cms:stub name='support_international_domains' filter='checkbox' />
        <cms:stub name='access_with_without_www' filter='checkbox' />
        <cms:stub name='website_management_features_group' />
        <cms:stub name='website_management_features_row' />
        <cms:stub name='multi_php_version' filter='checkbox' />
        <cms:stub name='web_based_file_manager' filter='checkbox' />
        <cms:stub name='awstats_web_site_statistics' filter='checkbox' />
        <cms:stub name='raw_log_accessing' filter='checkbox' />
        <cms:stub name='url_redirection' filter='checkbox' />
        <cms:stub name='hotlink_protection' filter='checkbox' />
        <cms:stub name='ip_deny_manager' filter='checkbox' />
        <cms:stub name='preinstalled_scripts' filter='checkbox' />
        <cms:stub name='backup_manager' filter='checkbox' />
        <cms:stub name='dev_tools_group' />
        <cms:stub name='dev_tools_row' />
        <cms:stub name='ssh_access' filter='checkbox' />
        <cms:stub name='anycast_nameserver' filter='checkbox' />
        <cms:stub name='terminal_access' filter='checkbox' />
        <cms:stub name='php_multiple_hardened_versions' filter='checkbox' />
        <cms:stub name='php_composer' filter='checkbox' />
        <cms:stub name='git' filter='checkbox' />
        <cms:stub name='website_importing' filter='checkbox' />
        <cms:stub name='mail_importing' filter='checkbox' />
        <cms:stub name='wordpress_toolkit' filter='checkbox' />
        <cms:stub name='server_software_features_group' />
        <cms:stub name='server_software_features_row' />
        <cms:stub name='ruby' filter='checkbox' />
        <cms:stub name='perl' filter='checkbox' />
        <cms:stub name='python' filter='checkbox' />
        <cms:stub name='mysql' filter='checkbox' />
        <cms:stub name='pear' filter='checkbox' />
        <cms:stub name='ssi' filter='checkbox' />
        <cms:stub name='cgi' filter='checkbox' />
        <cms:stub name='fastcgi' filter='checkbox' />
        <cms:stub name='custom_error_documents' filter='checkbox' />
        <cms:stub name='javascript' filter='checkbox' />
        <cms:stub name='gd_graphics_library' filter='checkbox' />
        <cms:stub name='curl_library' filter='checkbox' />
        <cms:stub name='phpmyadmin' filter='checkbox' />
        <cms:stub name='http3_quic' filter='checkbox' />
        <cms:stub name='nodejs' filter='checkbox' />
        <cms:stub name='wordpress_features_group' />
        <cms:stub name='wordpress_features_row' />
        <cms:stub name='one_click_wordpress_installation' filter='checkbox' />
        <cms:stub name='litespeed_cache_lscwp' filter='checkbox' />
        <cms:stub name='wordpress_security_scan' filter='checkbox' />
        <cms:stub name='wordpress_security_patch' filter='checkbox' />
        <cms:stub name='wordpress_backup_restore' filter='checkbox' />
        <cms:stub name='clone_wordpress_site' filter='checkbox' />
        <cms:stub name='guarantees_group' />
        <cms:stub name='guarantees_row' />
        <cms:stub name='full_money_back' filter='checkbox' />
        <cms:stub name='network_uptime' filter='checkbox' />
        <cms:stub name='server_uptime' filter='checkbox' />
        <cms:stub name='optional_addons_upgrades_group' />
        <cms:stub name='optional_addons_upgrades_row' />
        <cms:stub name='paid_ssl_certificate' filter='checkbox' />
        <cms:stub name='free_ssl_certificate' filter='checkbox' />
        <cms:stub name='activation_fee_free' filter='checkbox' />
        <cms:stub name='hosting_migration' filter='checkbox' />
    </cms:sub_template>
<!-- Hosting Subtemplate Ends -->
<!-- VPS Hosting Starts -->
    <cms:editable name='vps_hosting_group' label='VPS Hosting' type='group' order='130' collapsed='0' >
        <cms:editable name='vps_hosting_row' type='row' order='10'>
            <cms:editable name='dedicated_ip' label='Dedicated IP' type='single_check' opt_values='Yes' search_type='integer' order='40' class='col-md-2' />
            <cms:editable name='root_access' label='Root Access' type='single_check' opt_values='Yes' search_type='integer' order='50' class='col-md-2' />
            <cms:editable name='vps_management' label='VPS Management' opt_values='Managed=managed | Self Managed=self' order='60' opt_selected='managed' type='radio' class='col-md-2' />
            <cms:editable name='vps_management_panel' label='VPS Management Panel' type='single_check' opt_values='Yes' search_type='integer' order='70' class='col-md-2' />                      
            <cms:editable name='ddos_protection' label='DDoS Protection' type='single_check' opt_values='Yes' search_type='integer' order='80' class='col-md-2' />
            <cms:editable name='additional_ip' label='Additional IP' type='single_check' opt_values='Yes' search_type='integer' order='90' class='col-md-2' />
        </cms:editable>
        <cms:editable name='operating_system_row' type='row' order='20'>
        <cms:editable name='processor' label='Processor' type='relation' has='one' searchable='0' order='10' orderby='page_name' order_dir='asc' create_auto='1' show_manage='1' advanced_gui='1' class='col-md-4'  />
            <cms:editable name='operating_system' label='Operating System' desc='Operating System provided.' opt_values='Linux=linux | Windows=windows' order='20' opt_selected='linux' type='radio' class='col-md-4' />
            <cms:func _into='operating_system_cond' operating_system=''>
                <cms:if operating_system='windows'>hide<cms:else />show</cms:if>
            </cms:func>
            <cms:editable name='linux_os' label='Linux Operating System' desc='Specify the distro.' type='relation' not_active=operating_system_cond has='one' searchable='0' order='30' orderby='page_name' order_dir='asc' create_auto='1' show_manage='1' advanced_gui='1' class='col-md-4'  />
        </cms:editable>
        <cms:editable name='data_center_row' type='row' order='30'>           
            <cms:editable name='data_center' label='Data Center' desc='Data Center Location.' opt_values='Single Location=single | Multi Locations=multi' order='20' opt_selected='single' type='radio' class='col-md-4' />
            <cms:func _into='data_center_cond' data_center=''>
                <cms:if data_center='single'>hide<cms:else />show</cms:if>
            </cms:func>
            <cms:editable name='data_centers' label='Data Center Locations' type='relation' not_active=data_center_cond has='one' searchable='0' order='30' orderby='page_name' order_dir='asc' create_auto='1' show_manage='1' advanced_gui='1' class='col-md-4'  />
        </cms:editable>
        <cms:editable name='vps_others_row' type='row' order='40'>
        <cms:editable name='network_bandwidth' label='Network Bandwidth' type='relation' has='one' searchable='0' order='10' orderby='page_name' order_dir='asc' create_auto='1' show_manage='1' advanced_gui='1' class='col-md-4'  />
        <cms:editable name='backup_storage' label='Backup Storage' desc='Available Backup Storage' opt_values='Not Available=not_available | Available=available' order='20' opt_selected='not_available' type='radio' class='col-md-4' />
            <cms:func _into='backup_storage_cond' backup_storage=''>
                <cms:if backup_storage='not_available'>hide<cms:else />show</cms:if>
            </cms:func>
            <cms:editable name='backup_storage_size' label='Backup Storage, GB' desc='Only Number' type='text' not_active=backup_storage_cond  search_type='decimal' order='25' class='col-md-4' />            
        </cms:editable>
    </cms:editable>
    <!-- VPS Hosting Subtemplate Starts -->
    <cms:sub_template name='vps_hosting' label='VPS Hosting'>
        <cms:stub name='hosting_common_group' />
        <cms:stub name='hosting_common_row' />
        <cms:stub name='cpu' filter='slider' />
        <cms:stub name='memory' filter='slider' />
        <cms:stub name='control_panel' filter='dropdown' />        
        <cms:stub name='disk_space_row' />
        <cms:stub name='disk_space_type' filter='dropdown' />
        <cms:stub name='disk_space' filter='dropdown' />
        <cms:stub name='disk_space_limit' filter='slider' />
        <cms:stub name='bandwidth_row' />
        <cms:stub name='bandwidth' filter='dropdown' />
        <cms:stub name='bandwidth_limit' filter='slider' />    
        <cms:stub name='vps_hosting_group' />
        <cms:stub name='vps_hosting_row' />
        <cms:stub name='dedicated_ip' filter='checkbox' />
        <cms:stub name='root_access' filter='checkbox' />
        <cms:stub name='vps_management' filter='radio' />
        <cms:stub name='vps_management_panel' filter='checkbox' />
        <cms:stub name='ddos_protection' filter='checkbox' />
        <cms:stub name='additional_ip' filter='checkbox' />
        <cms:stub name='operating_system_row' />
        <cms:stub name='processor' filter='dropdown' />
        <cms:stub name='operating_system' filter='radio' />
        <cms:stub name='linux_os' filter='dropdown' />
        <cms:stub name='data_center_row' />
        <cms:stub name='data_center' filter='radio' />
        <cms:stub name='data_centers' filter='dropdown' />
        <cms:stub name='vps_others_row' />
        <cms:stub name='network_bandwidth' filter='dropdown' />
        <cms:stub name='backup_storage' filter='radio' />
        <cms:stub name='backup_storage_size' filter='slider' />              
        <cms:stub name='guarantees_group' />
        <cms:stub name='guarantees_row' />
        <cms:stub name='full_money_back' filter='checkbox' />
        <cms:stub name='network_uptime' filter='checkbox' />
        <cms:stub name='server_uptime' filter='checkbox' />
        <cms:stub name='optional_addons_upgrades_group' />
        <cms:stub name='optional_addons_upgrades_row' />
        <cms:stub name='paid_ssl_certificate' filter='checkbox' />
        <cms:stub name='free_ssl_certificate' filter='checkbox' />
        <cms:stub name='activation_fee_free' filter='checkbox' />
        <cms:stub name='hosting_migration' filter='checkbox' />        
        <cms:config_form_view>
            <cms:field 'vps_hosting_group' order='100' />            
        </cms:config_form_view>
    </cms:sub_template>
    <!-- VPS Hosting Subtemplate Ends -->
<!-- VPS Hosting Ends -->
</cms:template>
<cms:smart_embed 'hosting' debug='0' />
<?php COUCH::invoke(); ?>