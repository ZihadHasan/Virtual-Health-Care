<form action="{{route('patient.appointment.checkout',['id' => $appointment->id])}}" method="POST">
  {{ csrf_field() }}
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_P2w6IPKSPR2nSW1J8TcknISg"
    data-amount="{{$appointment->doctor->bill * 100}}"
    data-name="UAP Students Health Care"
    data-description="Pay to {{$appointment->doctor->user->name}}"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto">
  </script>
</form>
