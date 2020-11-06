<?php

function is_admin($request)
{
  if(!isset($request->session->admin_username)){
    show_error('Unauthorized');
  }
}