<div>
    <div>
        <input type="text" wire:model="dateRange" placeholder="Date Range">
        <select wire:model="orderStatus">
            <option value="">All Statuses</option>
            <option value="pending">Pending</option>
            <option value="accept">Accepted</option>
            <option value="reject">Reject</option>
        </select>
    </div>

    <table>
        <thead>
            <tr>
                <th>Order Id</th>
                <th wire:click="sortBy('created_at')">Date</th>
                <th wire:click="sortBy('status')">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>
                        <a href="{{ route('livewire.orders.history', ['order' => $order->id]) }}">{{ $order->id }}</a>
                    </td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
