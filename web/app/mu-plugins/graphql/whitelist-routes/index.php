<?php

add_filter( 
    'graphql_require_authentication_allowed_fields', 
    function( $allowed ) {
      $allowed = ['login', 'refreshJwtAuthToken'];
      return $allowed;
}, 10, 1 );