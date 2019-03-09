
@extends('layouts.app')
@section('content')
<div class="col-lg-10 col-lg-offset-1">
    <div id="otEmbedContainer" style="width:800px; height:640px"></div> <script src="https://tokbox.com/embed/embed/ot-embed.js?embedId=3732c308-c233-46b9-9bd4-7ab8a0d08fb2&room=<?php echo $id ?>"></script>
</div>
@endsection
