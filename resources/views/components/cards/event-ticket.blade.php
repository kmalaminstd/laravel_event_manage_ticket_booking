<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }

        .ticket {
            width: 100%;
            max-width: 800px;
            margin: auto;
            border: 2px dashed #333;
            background: #fff;
            padding: 0;
        }

        .ticket-table {
            width: 100%;
            border-collapse: collapse;
        }

        .left {
            width: 65%;
            padding: 20px;
            vertical-align: top;
            background: #f8f9fa;
        }

        .right {
            width: 35%;
            padding: 20px;
            text-align: center;
            background: #265367;
            color: #fff;
        }

        .title {
            font-size: 20px;
            font-weight: bold;
            color: #265367;
        }

        .badge {
            display: inline-block;
            margin-top: 5px;
            padding: 4px 10px;
            border: 1px solid #333;
            font-size: 12px;
        }

        .desc {
            margin: 15px 0;
            color: #555;
        }

        .info {
            margin-top: 10px;
        }

        .info-label {
            font-size: 12px;
            color: #888;
        }

        .info-value {
            font-weight: bold;
            margin-bottom: 8px;
        }

        .qr img {
            background: #fff;
            padding: 5px;
        }

        .code {
            margin-top: 10px;
            font-size: 14px;
            letter-spacing: 1px;
        }

        /* fake edge cut */
        .cut {
            width: 100%;
            height: 20px;
            background: repeating-linear-gradient(
                90deg,
                #fff,
                #fff 10px,
                #ddd 10px,
                #ddd 20px
            );
        }
    </style>
</head>
<body>

<div class="ticket">

    <table class="ticket-table">
        <tr>
            <!-- LEFT -->
            <td class="left">
                <div class="title">{{ $ticket->event->name }}</div>
                <div class="badge" style="color: black;">{{ $ticket->name }}</div>

                <div class="desc">
                    by {{ $order->event->user->name }}
                </div>

                <div class="info">
                    <div class="info-label">Date</div>
                    <div class="info-value">
                        {{ $order->event->start_date }}
                        @if ($order->event->end_date)
                            to {{ $order->event->end_date }}
                        @endif
                    </div>

                    <div class="info-label">Time</div>
                    <div class="info-value">{{ $order->event->schedule->first()->time }}</div>

                    <div class="info-label">Venue</div>
                    <div class="info-value">{{ $order->event->venue }}</div>

                    <div class="info-label">Guest</div>
                    <div class="info-value">{{ $order->quantity }}</div>
                </div>
            </td>

            <!-- RIGHT -->
            <td class="right">
                <div class="qr">
                    <img src="data:image/png;base64,{{ $qr }}" width="150" height="150">
                </div>

                <div class="code">{{ $order->order_code }}</div>
            </td>
        </tr>
    </table>

    <div class="cut"></div>

</div>

</body>
</html>