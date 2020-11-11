<?php

$id = $_GET['id'];
$pos_id = $_GET['pos'];



if ($pos_id == 1) {
  $url = 'https://ccvi-distributors-project.herokuapp.com/v1/pos/sales/';
  $token = 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyaWQiOjIwLCJ1c2VybmFtZSI6InNlcnZpY2VhY2NvdW50IiwiZW1haWwiOiIiLCJmdWxsbmFtZSI6IkN1ZW50YSBkZSBTZXJ2aWNpbyBHbG9iYWwiLCJhcHBsaWNhdGlvbnMiOlt7Im5hbWUiOiJzZXJ2aWNlbm9kZSIsIm5vZGVpZCI6MTAsInJpZ2h0cyI6eyJncm91cHMiOltdLCJyb2xlcyI6WyJST0xFX0lOVEVSTkFMX1NFUlZJQ0UiXSwicGVybWlzc2lvbnMiOltdfX1dLCJpYXQiOjE2MDQwNDgwNDEsImV4cCI6MTYwNjY0MDA0MSwiYXVkIjoiaHR0cDovL2luZ2VuaWVyaWFkZXNvZnR3YXJlMjAyMC5jb20iLCJpc3MiOiJTdXBlciBFUlAgMzAwMCIsInN1YiI6InVzZXJAZXJwMzAwMC5jb20ifQ.UaBRLPU323jkiNaKX0sdS_SWnZSbpUQJVKYOsGjLVYkMZEC5wzz0-KFZEuqOiCbgJcs13tRxTI9IJL7UfAKWVQ';
  
  $request_url = $url.$id.'/invoice';
  
  
  $curl = curl_init($request_url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER, [
      'Authorization: '.$token,
      'Content-Type: application/json'
  ]);
  $response = curl_exec($curl);
  curl_close($curl);
} else {
  $url = 'https://is-pos-api-gp6.herokuapp.com/pos/2/internal-sales/';
  $token = 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyaWQiOjIwLCJ1c2VybmFtZSI6InNlcnZpY2VhY2NvdW50IiwiZW1haWwiOiIiLCJmdWxsbmFtZSI6IkN1ZW50YSBkZSBTZXJ2aWNpbyBHbG9iYWwiLCJhcHBsaWNhdGlvbnMiOlt7Im5hbWUiOiJzZXJ2aWNlbm9kZSIsIm5vZGVpZCI6MTAsInJpZ2h0cyI6eyJncm91cHMiOltdLCJyb2xlcyI6WyJST0xFX0lOVEVSTkFMX1NFUlZJQ0UiXSwicGVybWlzc2lvbnMiOltdfX1dLCJpYXQiOjE2MDQwNDgwNDEsImV4cCI6MTYwNjY0MDA0MSwiYXVkIjoiaHR0cDovL2luZ2VuaWVyaWFkZXNvZnR3YXJlMjAyMC5jb20iLCJpc3MiOiJTdXBlciBFUlAgMzAwMCIsInN1YiI6InVzZXJAZXJwMzAwMC5jb20ifQ.UaBRLPU323jkiNaKX0sdS_SWnZSbpUQJVKYOsGjLVYkMZEC5wzz0-KFZEuqOiCbgJcs13tRxTI9IJL7UfAKWVQ';
  
  $request_url = $url.$id.'/invoice';
  
  
  $curl = curl_init($request_url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER, [
      'Authorization: '.$token,
      'Content-Type: application/json'
  ]);
  $response = curl_exec($curl);
  curl_close($curl);
}










  header('Content-type: application/pdf');
  header("Cache-Control: no-cache");
  header("Pragma: no-cache");
  header("Content-Disposition: inline;filename='document.pdf'");
  header("Content-length: ".strlen($response));
  echo $response;
  exit();
?>