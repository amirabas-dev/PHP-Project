<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Show the dashboard.
     */
    public function dashboard()
    {
        return view('index');
    }

    /**
     * Show the profile page.
     */
    public function profile()
    {
        return view('profile');
    }

    /**
     * Show the charts page.
     */
    public function charts()
    {
        return view('charts');
    }

    /**
     * Show the tables page.
     */
    public function tables()
    {
        return view('tables');
    }

    /**
     * Show the forms page.
     */
    public function forms()
    {
        return view('forms');
    }

    /**
     * Show the components page.
     */
    public function components()
    {
        return view('components');
    }

    /**
     * Show the alerts page.
     */
    public function alerts()
    {
        return view('alerts');
    }

    /**
     * Show the modals page.
     */
    public function modals()
    {
        return view('modals');
    }

    /**
     * Show the settings page.
     */
    public function settings()
    {
        return view('settings');
    }

    /**
     * Show the blank page.
     */
    public function blank()
    {
        return view('blank');
    }

    /**
     * Show the create agent page.
     */
    public function createAgent()
    {
        return view('create_agent');
    }

    /**
     * Show the forgot password page.
     */
    public function forgotPassword()
    {
        return view('forgot_password');
    }

    /**
     * Show the 404 error page.
     */
    public function notFound()
    {
        return view('404');
    }

    /**
     * Show the 500 error page.
     */
    public function serverError()
    {
        return view('500');
    }
}
