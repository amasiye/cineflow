<?php

/**
 *
 */
class API extends Controller
{
  public function index($version = 'v1', $resource = '', $ids = '')
  {
    if(isset($_REQUEST[LABEL_APIKEY]) && !empty($_REQUEST[LABEL_APIKEY]))
    {
      switch($version)
      {
        case 'v1':
          $this->handle_action($resource, $ids, 'api/index', ['header' => 'header-json', 'footer' => 'footer-json']);
          break;

        default:
          $this->view('api/index', ['header' => 'header-json', 'footer' => 'footer-json']);
          break;
      }
    }
    else
    {
      $this->view('api/index', ['header' => 'header-json', 'footer' => 'footer-json']);
    }
  } // end index()

  public function default()
  {
    $this->view('api/index', ['header' => 'header-json', 'footer' => 'footer-json']);
  }

  public function users($resource = '', $ids = '')
  {
    switch(strtolower($_SERVER['REQUEST_METHOD']))
    {
      case 'get':
        if(empty($resource))
        {
        }
        break;

      case 'post':
        break;

      case 'put':
        break;

      case 'delete':
        break;
    }
  } // end user()

  public function get_response($status = STATUS_BAD_REQUEST, $data = [])
  {
    $response = [
                  'success' => false,
                  'status'  => $status,
                  'message' => 'Bad Request',
                  'data'    => $data
                ];
    switch ($status)
    {
      case STATUS_OK:
        $response['success'] = true;
        $response['message'] = 'OK';
        break;

      case STATUS_ACCEPTED:
        $response['success'] = true;
        $response['message'] = 'Accepted';
        break;

      case STATUS_OK_BLANK:
        $response['success'] = true;
        $response['message'] = 'OK';
        break;

      case STATUS_CREATED:
        $response['success'] = true;
        $response['message'] = 'Created';
        break;

      case STATUS_FORBIDDEN:
        $response['success'] = false;
        $response['message'] = 'Forbidden';
        break;

      case STATUS_METHOD_NOT_ALLOWED:
        $response['success'] = false;
        $response['message'] = 'Method not allowed';
        break;

      case STATUS_NOT_FOUND:
        $response['success'] = false;
        $response['message'] = 'Not Found';
        break;

      case STATUS_UNAUTHORIZED:
        $response['success'] = false;
        $response['message'] = 'Unauthorized';
        break;

      default:
        break;
    }

    return json_encode($response);
  } // end get_response()

  public function response($status = STATUS_BAD_REQUEST, $data = [])
  {
    echo get_response($status, $data);
  } // end response()

} // end API{}

?>
