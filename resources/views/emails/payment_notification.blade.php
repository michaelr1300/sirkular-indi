@component('mail::message')

Pesanan atas nama <b>{{ $order->buyer_name }}</b> telah mengirimkan bukti transfer.

Klik tombol di bawah ini untuk melihatnya.

@component('mail::button', ['url' => 'https://indisirkular.id/dashboard/order'])
Lihat Pesanan
@endcomponent
@endcomponent
