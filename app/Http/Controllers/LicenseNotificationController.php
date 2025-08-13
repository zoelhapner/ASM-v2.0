<?php

namespace App\Http\Controllers;

use App\Models\LicenseNotification;

class LicenseNotificationController extends Controller
{
    public function markAsRead(LicenseNotification $notification)
    {
        $notification->update(['read' => true]);

        // Redirect ke halaman detail lisensi
        return redirect()->route('licenses.index', $notification->license_id);
    }

    public function markAllAsRead()
{
    \App\Models\LicenseNotification::where('read', false)->update(['read' => true]);
    return back();
}

}
