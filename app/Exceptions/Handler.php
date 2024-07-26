<?php
namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class Handler extends ExceptionHandler
{
    // Existing code...

    public function render($request, Throwable $exception)
    {
        // Check if the request is for the admin section
        if (strpos($request->path(), 'admin') === 0) {
            // Handle admin-specific errors
            if ($exception instanceof NotFoundHttpException) {
                return response()->view('admin.errors.404', [], 404);
            }

            if ($exception instanceof HttpException) {
                $statusCode = $exception->getStatusCode();
                if (View::exists("admin.errors.{$statusCode}")) {
                    return response()->view("admin.errors.{$statusCode}", [], $statusCode);
                }
            }
        } else {
            // Handle website-specific errors
            if ($exception instanceof NotFoundHttpException) {
                return response()->view('web.errors.404', [], 404);
            }

            if ($exception instanceof HttpException) {
                $statusCode = $exception->getStatusCode();
                if (View::exists("errors.{$statusCode}")) {
                    return response()->view("web.errors.{$statusCode}", [], $statusCode);
                }
            }
        }

        return parent::render($request, $exception);
    }
}
