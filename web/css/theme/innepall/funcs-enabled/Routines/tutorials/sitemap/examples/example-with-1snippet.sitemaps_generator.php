<?php require_once 'couch/cms.php'; ?>
<cms:template title='Robots & Sitemaps generator' parent='_menu_group_system_' icon='loop' order='1'>

   <cms:config_form_view>

   </cms:config_form_view>

</cms:template>



<cms:func 'add-job' name='myjob' list='mytodo' ><cms:ignore>
    ---
    1. Creates an object 'job' only with named parameters, including user-supplied extra params;
    2. Validate user-supplied functions
    3. Adds the object 'myjob' to the array 'mytodo'.

    View README.md!!

    Example -

        <cms:call 'add-job' name='myjob' list='mytodo' /><cms:show mytodo as_json='1'/>

    ---
    You should have downloaded this function from https://github.com/trendoman/Cms-Fu
    Donate and help keep functions updated!
    Support requests: tony.smirnov@gmail.com "Antony"
    </cms:ignore>
    <cms:set job = "[]" is_json='1' />

    <cms:set job.name = name />

    <cms:set job.is_complete = "" />
    <cms:set job.status = "" />
    <cms:set job.error = "" />

    <cms:set job.initial_task = "<cms:get 'k_named_args.initial_task' default='' />" />
    <cms:set job.current_task = "<cms:get 'k_named_args.current_task' default='' />" />
    <cms:set job.sequent_task = "<cms:get 'k_named_args.sequent_task' default='' />" />

    <cms:if k_named_args.masterpage && job.initial_task eq '' && job.current_task eq '' && job.sequent_task eq '' >
        <cms:set template_link = "<cms:link masterpage=k_named_args.masterpage />" />
        <cms:set starting_link = "<cms:add_querystring link=template_link querystring="<cms:concat 'job=' job.name />" />" />
        <cms:set starting_link = "<cms:add_querystring link=starting_link querystring=k_named_args.qs />" />
        <cms:set job.initial_task = starting_link />
        <cms:set job.current_task = starting_link />
        <cms:set job.sequent_task = starting_link />
    </cms:if>

    <cms:set job.time_start = "" />
    <cms:set job.time_close = "" />
    <cms:set job.report = '[]' is_json='1' />
    <cms:set job.msg = "" />
    <cms:set job.notes = '[]' is_json='1' />

    <cms:set job.list = list />
    <cms:set job.user = k_named_args />


    <cms:if "<cms:is_array k_named_args.engine_func />"><cms:set job.notes. = 'Using custom ~anonymous func~ engine.' />
    <cms:else_if "<cms:not k_named_args.engine_func />" /><cms:set job.notes. = 'Using default ~fetch-url~ engine.' />
    <cms:else_if k_named_args.engine_func /><cms:set job.notes. = "Using custom ~<cms:show k_named_args.engine_func />~ engine." />
    </cms:if>

    <cms:if "<cms:is_array k_named_args.report_func />"><cms:set job.notes. = 'Using custom ~anonymous func~ report.' />
    <cms:else_if "<cms:not k_named_args.report_func />" /><cms:set job.notes. = 'Opted not to display report via "report_func".' />
    <cms:else_if k_named_args.report_func /><cms:set job.notes. = "Using custom ~<cms:show k_named_args.report_func />~ report." />
    </cms:if>


    <cms:if "<cms:call 'is-callable' k_named_args.engine_func />" >
    <cms:else_if k_named_args.engine_func = '' /><cms:set job.user.engine_func = '' />
    <cms:else /><cms:set job.user.engine_func = 'ERROR' /><cms:set job.notes. = "ERROR: specified custom engine function is not callable." />
    </cms:if>

    <cms:if "<cms:call 'is-callable' k_named_args.report_func />" ><cms:set job.user.report_func = k_named_args.report_func />
    <cms:else_if k_named_args.report_func = '' /><cms:set job.user.report_func = '' />
    <cms:else /><cms:set job.user.report_func = 'ERROR' /><cms:set job.notes. = "ERROR: specified custom report function is not callable." />
    </cms:if>


    <cms:call 'add-value-to-array' value=job array=list />
</cms:func>
<cms:func 'execute-jobs' itinerary='' ><cms:ignore>
    ---
    Since each 'task' is a paginated link, this func does a 'while' loop
    requesting URIs. Tasks are waiting to work and report paginated link to next task.

    Example -

        <cms:call 'execute-jobs' 'mytodo' />

    ---
    You should have downloaded this function from https://github.com/trendoman/Cms-Fu
    Donate and help keep functions updated!
    Support requests: tony.smirnov@gmail.com "Antony"
    </cms:ignore>
    <cms:each itinerary as='job' startcount='1' is_json='1'>

            <cms:set job.time_start = "<cms:date format='H:i:s'/><cms:if "<cms:func_exists 'show-ms' />" > <cms:call 'show-ms' /></cms:if>" />
            <cms:set allowed='1'/>

            <cms:while allowed >

                    <cms:set job.current_task = job.sequent_task scope='parent' />

                    <cms:capture into='response' is_json='1' trim='1' >
                        <cms:if "<cms:call 'is-callable' func=job.user.engine_func />" ><cms:call job.user.engine_func job />
                        <cms:else /><cms:call 'fetch-url' url=job.current_task as_ajax='1' send_cookie='0'/>
                        </cms:if>
                    </cms:capture>

                            <cms:if "<cms:is_array response />"><cms:set response.current_task = job.current_task scope='parent' memo="Add current URL to report?"/></cms:if>

                            <cms:if response.success && response.continue && response.sequent_task>

                                <cms:set job.sequent_task = response.sequent_task scope='parent' />

                            <cms:else_if response.success />

                                <cms:set job.is_complete = '1' scope='parent' />
                                <cms:set allowed='0' memo="<!-- break the loop and start the next job -->"/>

                            <cms:else_if response.error />

                                <cms:set job.error = response.error scope='parent' />
                                <cms:set allowed='0' memo="<!-- break the loop and start the next job -->"/>

                            <cms:else />

                                <cms:set job.error = 'ERROR: Task code is wrong!' scope='parent' />
                                <cms:set job.notes. = 'ABORT! Request *unexpectedly* reported no status.' scope='parent' />
                                <cms:set job.notes. = 'Requested task must return valid JSON with "success" or "error".' scope='parent' />
                                <cms:set job.notes. = 'Requested task may also have "continue" and "sequent_task".' scope='parent' />
                                <cms:set job.report. = job.current_task scope='parent' />
                                <cms:set job.report. = 'REQUEST_FAIL' scope='parent' />
                                <cms:set allowed='0' memo="<!-- break the loop and start the next job -->"/>

                            </cms:if>

                            <cms:set job.report. = response scope='parent' />

            </cms:while>

            <cms:set job.time_close = "<cms:date format='H:i:s'/><cms:if "<cms:func_exists 'show-ms' />" > <cms:call 'show-ms' /></cms:if>" />

            <cms:if job.error>

                <cms:set job.status = 'JOB_ERROR' />
                <cms:set job.msg="Job [ <cms:show job.name /> ] FAILED" />

            <cms:else_if job.is_complete />

                <cms:set job.status='JOB_COMPLETE' />
                <cms:set job.msg="Job [ <cms:show job.name /> ] is COMPLETE" />

            </cms:if>

            <cms:if "<cms:call 'is-callable' func=job.user.report_func />"><cms:call job.user.report_func job /></cms:if>
    </cms:each>

</cms:func>
<cms:func 'task-file-runner' path_func=''><cms:ignore>
    ---
    Task wrapper.
    Embeds a snippet and returns back in JSON whatever the snippet echo'ed.
    Params for snippet are usually taken from URL or may be passed directly.

    Example -

        <cms:call 'task-file-runner' />

    ---
    You should have downloaded this function from https://github.com/trendoman/Cms-Fu
    Donate and help keep functions updated!
    Support requests: tony.smirnov@gmail.com "Antony"
    </cms:ignore><cms:ignore>

            * send back prepared JSON with details how task performed.
    </cms:ignore>
    <cms:set job_name = "<cms:get 'k_named_args.job'   default="<cms:gpc 'job' method='get' />" />" />
    <cms:set pg       = "<cms:get 'k_named_args.pg'    default="<cms:gpc 'pg' method='get' />" />" />
    <cms:set pg_limit = "<cms:get 'k_named_args.limit' default="<cms:gpc 'limit' method='get' />" />" memo="<!--tweak pagination limit via QS: 'limit=50' or caller param -->" />
    <cms:set pg_limit = "<cms:get 'pg_limit' default='25' />" memo="<!--25 is default limit if not found in URL or param-->" />

    <cms:set task = '[]' is_json='1' />

    <cms:set task.success = "" />
    <cms:set task.continue = "" />
    <cms:set task.current_task = "" />
    <cms:set task.sequent_task = "" />
    <cms:set task.error = "" />
    <cms:set task.msg = "" />

    <cms:set task.task_time_start = "<cms:date format='H:i:s'/><cms:if "<cms:func_exists 'show-ms' />" > <cms:call 'show-ms' /></cms:if>" />
    <cms:set task.task_time_close = "" />
    <cms:set task.pg = pg />
    <cms:set task.pg_limit = pg_limit />
    <cms:set task.notes = "[]" is_json='1' />
    <cms:set task.task_file = "<cms:show job_name />.inc" />
    <cms:set task.path_func = path_func />

    <cms:if "<cms:call 'is-callable' func=task.path_func />"><cms:set task.task_file = "<cms:trim><cms:call task.path_func job_name /></cms:trim>" /></cms:if>
    <cms:if "<cms:exists task.task_file />"><cms:embed task.task_file param1='test'></cms:embed>
    <cms:else /><cms:set task.error = "File [ <cms:show task.task_file /> ] not found" />
    </cms:if>

    <cms:set task.task_time_close = "<cms:date format='H:i:s'/><cms:if "<cms:func_exists 'show-ms' />" > <cms:call 'show-ms' /></cms:if>" />

    <cms:abort>
        <cms:content_type 'application/json' />
        <cms:show task as_json='1' />
    </cms:abort>
</cms:func>
<cms:func 'is-lockable' uid=''><cms:ignore>
   ---
   Tries to obtain lock and return 1 if successful => parallel / simultaneous script exec is prevented.
   Example -

     <cms:call 'is-lockable' />

   ---
   You should have downloaded this function from https://github.com/trendoman/Cms-Fu
   Donate and help keep functions updated!
   Support requests: tony.smirnov@gmail.com "Antony"
   </cms:ignore>
   <cms:php>
      global $DB, $CTX;
      $uid = $DB->sanitize( $CTX->get('uid') );
      if( !$uid ) $uid = date('YmdHis', ceil(time()/(15*60))*15*60);
      $handle = 'lock_is_lockable_'.$uid;

      if( !$DB->is_free_lock($handle) ){ return 0;}
      if( !$DB->get_lock($handle) ){ return 0;}

      register_shutdown_function(function() use ($DB, $handle) {
         $DB->release_lock( $handle );
      });

      return 1;
   </cms:php>
</cms:func>
<cms:func 'is-callable' func=''><cms:ignore>
    ---
    Is a named or anonymous function available to be called?
    Example -

        <cms:call 'is-callable' func='myfunc' /> - normal funcs
        <cms:call 'is-callable' func= myfunc />  - anonymous funcs

    ---
    You should have downloaded this function from https://github.com/trendoman/Cms-Fu
    Donate and help keep functions updated!
    Support requests: tony.smirnov@gmail.com "Antony"
    </cms:ignore><cms:trim>
    <cms:if "<cms:func_exists func />" >1
    <cms:else_if "<cms:is_array func.code />" && "<cms:is_array func.params />" /><cms:ignore>Anonymous?</cms:ignore>1
    <cms:else />0
    </cms:if></cms:trim>
</cms:func>
<cms:func 'fetch-url' url='' as_ajax='1' send_cookie='1' accept_cookie='1' ><cms:ignore>
   ---
   Requests content of any URL
   Example -

      <cms:call 'fetch-url' k_page_link />

   ---
   You should have downloaded this function from https://github.com/trendoman/Cms-Fu
   Donate and help keep functions updated!
   Support requests: tony.smirnov@gmail.com "Antony"
   </cms:ignore>
   <cms:php>
      global $CTX, $DB, $FUNCS;

      if( isset($_SERVER['HTTP_COUCHCMS_SELF_FETCH_ONCE']) ){ return; }
      if (! $myURL = filter_var( trim($CTX->get('url')), FILTER_VALIDATE_URL ) )
      {
         error_log( "ERROR in func 'fetch-url'. Invalid supplied URL: " . $CTX->get('url') );
         return( "ERROR in func 'fetch-url'. Invalid supplied URL: " . $CTX->get('url') );
      }

      $mycookie = '';
      $referer = '';
      $http_header = array();

      $send_cookie = $CTX->get('send_cookie', 1) == '0' ? 0 : 1;
      $accept_cookie = $CTX->get('accept_cookie', 1) == '0' ? 0 : 1;
      if( $CTX->get('as_ajax', 1) != '0' ) {
         $http_header[] = "X-Requested-With: XMLHttpRequest";
      }
      if( strpos($myURL, K_SITE_URL) )
      {
         /* Same-domain request - closing session, do not force commit */
         if( session_id() ) session_write_close();
         $DB->commit(0);

         if( $send_cookie )
         {
            foreach( $_COOKIE as $k=>$v ){
               if( is_array($k) === 0 ) $mycookie .= $k."=".$v."; ";
            }
         }
         /* Protect from self-looping */
         $http_header[] = "COUCHCMS_SELF_FETCH_ONCE: 1";
         $referer = $CTX->get('k_page_link');
      }

      $curlopts = $CTX->get('curl');

      $arr_cookies = array_filter( array_map( "trim", explode(";", $curlopts['cookies']) ), "strlen");
      $mycookie.= implode(";", $arr_cookies);
      $useragent = $curlopts['useragent'] ? trim($curlopts['useragent']) : "CouchCMS ".$CTX->get('k_cms_version');
      $referer = $curlopts['referer'] ? trim($curlopts['referer']) : $referer;

      if( extension_loaded('curl') ){

         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $myURL );
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0 );
         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0 );
         curl_setopt($ch, CURLOPT_TIMEOUT, 20);
         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1 );
         curl_setopt($ch, CURLOPT_AUTOREFERER, 1 );
         curl_setopt($ch, CURLOPT_MAXREDIRS, 3 );
         curl_setopt($ch, CURLOPT_REFERER, $referer);
         curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
         curl_setopt($ch, CURLOPT_HTTPHEADER, $http_header);
         curl_setopt($ch, CURLOPT_COOKIE, $mycookie );

         if( $accept_cookie ){
             $cookie_file = $FUNCS->get_tmp_dir().'mycookies.txt';
             curl_setopt($ch, CURLOPT_COOKIESESSION, true);
             curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
         }

         $output = curl_exec($ch);
         $status = curl_getinfo($ch);
         curl_close($ch);

         $CTX->set('curl.status', $status, 'parent');
      } else {
         $opts = array();
         if( strpos($myURL, 'https')===0 ){
             $opts['ssl'] = array(
                 'verify_peer' => false,
                 'verify_host' => false,
                 'capture_peer_cert' => false,
             );
         }
         $opts['http']['header'] = implode("\r\n", $http_header) . "\r\nCookie: " . $mycookie;
         $context = stream_context_create( $opts );
         $output = @file_get_contents( $myURL, false, $context );
      }

      return $output;
    </cms:php>
</cms:func>
<cms:func 'add-value-to-array' value='' array=''><cms:ignore>
    ---
    Adds a given value ("string", array "[]" or object "{}") into the "[]" array.
        *   Will create a new array, if one not present in 'global' scope.
    Example -

        <cms:call 'add-value-to-array' job 'my_todo' />

    ---
    You should have downloaded this function from https://github.com/trendoman/Cms-Fu
    Donate and help keep functions updated!
    Support requests: tony.smirnov@gmail.com "Antony"
    </cms:ignore>
    <cms:get array into='myarray' />
    <cms:if "<cms:is_array myarray />" >
        <cms:put var="<cms:show array />." value=value scope='global' />
    <cms:else />
        <cms:put var="<cms:show array />" value='[]' scope='global' is_json='1' />
        <cms:put var="<cms:show array />." value=value scope='global' />
    </cms:if>
</cms:func>
<cms:func 'clock' memo='' show='0'><cms:ignore>
   ---
   Records time and memo
   Example -

     <cms:call 'clock' memo='Tag :pages start'/>

   ---
   You should have downloaded this function from https://github.com/trendoman/Cms-Fu
   Donate and help keep functions updated!
   Write me to: tony.smirnov@gmail.com "Antony"
   </cms:ignore>
   <cms:set clock = "<cms:get 'clock' default='[]' scope='global' as_json='1' />" is_json='1' scope='global'/>
   <cms:set tnow = "<cms:date format='H:i:s'/> <cms:call 'show-ms' />" />
   <cms:put var="clock.<cms:show tnow />" value=memo scope='global'/>
   <cms:if show ><cms:if "<cms:tag_exists 'show_json' />"><cms:show_json clock /><cms:else /><cms:show clock as_json='1' /></cms:if></cms:if>
</cms:func>
<cms:func 'show-ms'><cms:ignore>
   ---
   Show milliseconds of current time.
   Example -

     <cms:call 'show-ms' />

   ---
   You should have downloaded this function from https://github.com/trendoman/Cms-Fu
   Donate and help keep functions updated!
   Support requests: tony.smirnov@gmail.com "Antony"
   </cms:ignore><cms:php>
      return $milliseconds = substr(round(microtime(true) * 1000), -3);
   </cms:php>
</cms:func>
<cms:func 'php-time-limit' timeout='120'><cms:ignore>
   ---
   Override PHP maximum time for executing a script
   Example -

     <cms:call 'php-time-limit' '0' />

   ---
   You should have downloaded this function from https://github.com/trendoman/Cms-Fu
   Donate and help keep functions updated!
   Support requests: tony.smirnov@gmail.com "Antony"
   </cms:ignore>
   <cms:php>
      if( ! function_exists('set_time_limit') ){
         die('Error: PHP function "set_time_limit" is disabled on this server.');
      }
      global $CTX;
      $t = intval($CTX->get('timeout'));
      if( $t < 0 ) $t = 120;
      set_time_limit($t);
   </cms:php>
</cms:func>


<cms:if "<cms:is_ajax />">
   <cms:if "<cms:call 'is-lockable' 'test' />">
       <cms:call 'task-file-runner' />
   </cms:if>
</cms:if>

<cms:call 'add-job' name='gen_sitemap' list='mylist' masterpage='sitemaps_generator.php' qs='limit=10' />
<cms:call 'php-time-limit' '0' />

<cms:test ignore='0'>
   <cms:call 'execute-jobs' mylist />
</cms:test>


<?php COUCH::invoke(); ?>
