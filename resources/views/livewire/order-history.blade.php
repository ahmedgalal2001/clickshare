<div>
    <h2>Order History for Order #{{ $order->id }}</h2>
    <ul>
        @foreach ($order->auditLogs as $log)
            <li>
                <strong>{{ $log->created_at }}</strong>: {{ $log->action }}
                <pre>{{ json_encode($log->changes, JSON_PRETTY_PRINT) }}</pre>
            </li>
        @endforeach
    </ul>
</div>
