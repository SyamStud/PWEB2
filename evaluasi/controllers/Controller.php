<?php

class Controller
{
  protected function response(string $content, int $status = 200)
  {
    http_response_code($status);
    echo $content;
  }

  protected function view(string $view, array $variables = [], int $status = 200): void
  {
    // Extract the variables to a local namespace
    extract($variables);

    // Start output buffering
    ob_start();

    include __DIR__ . "/../views/{$view}.php";

    // End buffering and return its contents
    $output = ob_get_clean();

    $this->response($output, $status);
  }

  protected function redirect(string $url, int $status = 301)
  {
    http_response_code($status);

    header("Location: " . $url);
  }
}
