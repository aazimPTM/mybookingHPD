<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Submitted</title>
</head>
<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #f8f9fc; color: #0f1419;">

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #f8f9fc; padding: 40px 20px;">
        <tr>
            <td align="center">

                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width: 540px; background-color: #ffffff; border-radius: 24px; overflow: hidden; box-shadow: 0 25px 60px -15px rgba(124, 58, 237, 0.2), 0 4px 20px -4px rgba(15, 20, 25, 0.05);">

                    <tr>
                        <td style="background: linear-gradient(135deg, #4c1d95 0%, #7c3aed 45%, #6366f1 100%); padding: 48px 32px 44px 32px; text-align: center;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 26px; font-weight: 800; letter-spacing: -0.02em; line-height: 1.2;">
                                Booking Received
                            </h1>
                            <p style="color: rgba(255, 255, 255, 0.88); margin: 10px 0 0 0; font-size: 14px; font-weight: 500;">
                                Hi {{ $booking->user->name ?? 'there' }}, we've got your request.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 32px 32px 24px 32px;">

                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto 24px auto;">
                                <tr>
                                    <td style="background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%); border: 1.5px solid #fde68a; border-radius: 999px; padding: 9px 18px;">
                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                            <tr>
                                                <td style="padding-right: 7px;" valign="middle">
                                                    <div style="width: 7px; height: 7px; background-color: #f59e0b; border-radius: 50%; box-shadow: 0 0 8px rgba(245, 158, 11, 0.6);"></div>
                                                </td>
                                                <td valign="middle">
                                                    <span style="font-size: 11px; font-weight: 800; color: #92400e; letter-spacing: 0.06em; text-transform: uppercase;">
                                                        Pending Approval
                                                    </span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <p style="font-size: 14px; line-height: 1.6; color: #475569; margin: 0 0 24px 0; text-align: center;">
                                Your booking request has been submitted successfully. We'll notify you once it's been reviewed.
                            </p>

                            <div style="background: linear-gradient(135deg, #fafbff 0%, #f5f3ff 100%); border: 1px solid #eef1f8; border-radius: 16px; overflow: hidden; margin: 0 0 24px 0;">

                                <div style="padding: 16px 20px; border-bottom: 1px solid rgba(124, 58, 237, 0.1); text-align: center;">
                                    <p style="margin: 0 0 4px 0; font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.12em;">Booking Reference</p>
                                    <span style="font-family: 'SF Mono', Monaco, monospace; font-size: 14px; font-weight: 800; color: #7c3aed;">
                                        #{{ $booking->id ?? '12345' }}
                                    </span>
                                </div>

                                <div style="padding: 16px 20px; border-bottom: 1px solid rgba(124, 58, 237, 0.08);">
                                    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                        <tr>
                                            <td width="40" valign="middle">
                                                <div style="width: 32px; height: 32px; background: linear-gradient(135deg, #ede9fe, #f3e8ff); border-radius: 8px; text-align: center; line-height: 32px;">
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#7c3aed" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-top: -2px;">
                                                        <path d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/>
                                                    </svg>
                                                </div>
                                            </td>
                                            <td valign="middle" style="padding-left: 12px;">
                                                <p style="margin: 0 0 2px 0; font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.12em;">Room</p>
                                                <p style="margin: 0; font-size: 15px; font-weight: 800; color: #0f1419;">{{ $booking->room->name ?? 'Room Name' }}</p>
                                                @if(isset($booking->room) && $booking->room->building)
                                                    <p style="margin: 2px 0 0 0; font-size: 11px; color: #64748b; font-weight: 500;">{{ $booking->room->building }}</p>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <div style="padding: 16px 20px;{{ isset($booking->purpose) && $booking->purpose ? ' border-bottom: 1px solid rgba(124, 58, 237, 0.08);' : '' }}">
                                    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                        <tr>
                                            <td width="40" valign="middle">
                                                <div style="width: 32px; height: 32px; background: linear-gradient(135deg, #fef3c7, #fde68a); border-radius: 8px; text-align: center; line-height: 32px;">
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-top: -2px;">
                                                        <path d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5"/>
                                                    </svg>
                                                </div>
                                            </td>
                                            <td valign="middle" style="padding-left: 12px;">
                                                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                    <tr>
                                                        <td>
                                                            <p style="margin: 0 0 2px 0; font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.12em;">Date</p>
                                                            <p style="margin: 0; font-size: 14px; font-weight: 700; color: #0f1419;">{{ \Carbon\Carbon::parse($booking->start_time)->format('D, d M Y') }}</p>
                                                        </td>
                                                        <td align="right">
                                                            <p style="margin: 0 0 2px 0; font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.12em;">Time</p>
                                                            <p style="margin: 0; font-size: 14px; font-weight: 700; color: #0f1419;">{{ \Carbon\Carbon::parse($booking->start_time)->format('g:i A') }} – {{ \Carbon\Carbon::parse($booking->end_time)->format('g:i A') }}</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                @if(isset($booking->purpose) && $booking->purpose)
                                <div style="padding: 16px 20px;">
                                    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                        <tr>
                                            <td width="40" valign="middle">
                                                <div style="width: 32px; height: 32px; background: linear-gradient(135deg, #cffafe, #a5f3fc); border-radius: 8px; text-align: center; line-height: 32px;">
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#0891b2" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-top: -2px;">
                                                        <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                    </svg>
                                                </div>
                                            </td>
                                            <td valign="middle" style="padding-left: 12px;">
                                                <p style="margin: 0 0 2px 0; font-size: 9px; font-weight: 800; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.12em;">Purpose</p>
                                                <p style="margin: 0; font-size: 13px; font-weight: 600; color: #334155; line-height: 1.4;">{{ $booking->purpose }}</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                @endif

                            </div>

                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td align="center">
                                        <a href="{{ route('dashboard') }}" style="background: linear-gradient(135deg, #7c3aed 0%, #6366f1 100%); color: #ffffff; text-decoration: none; padding: 14px 36px; font-size: 13px; font-weight: 800; border-radius: 10px; display: inline-block; letter-spacing: -0.01em; box-shadow: 0 8px 20px -4px rgba(124, 58, 237, 0.4);">
                                            View My Bookings →
                                        </a>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 0 32px 28px 32px; text-align: center;">
                            <div style="height: 1px; background: linear-gradient(90deg, transparent, #eef1f8, transparent); margin-bottom: 20px;"></div>
                            
                            <!-- MyBookingHPD Brand -->
                            <p style="margin: 0; font-size: 18px; font-weight: 800; letter-spacing: -0.03em; line-height: 1;">
                                <span style="color: #0f1419;">MyBooking</span><span style="color: #6366f1;">HPD</span>
                            </p>
                            
                            <p style="margin: 6px 0 0 0; font-size: 11px; color: #94a3b8; font-weight: 500;">
                                Hospital Port Dickson · Room Booking System
                            </p>
                            <p style="margin: 10px 0 0 0; font-size: 10px; color: #cbd2e0; line-height: 1.5;">
                                This is an automated message. Please do not reply.
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>
