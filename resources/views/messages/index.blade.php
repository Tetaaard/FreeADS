<div class="msg_history" >

  <div class="message-wrapper">
    <ul class="messages">
        @foreach($messages as $message)
            <li class="message clearfix">
                {{--if message from id is equal to auth id then it is sent by logged in user --}}
                <div class="{{ ($message->from == Auth::id()) ? 'outgoing_msg' : 'received_msg' }}">
                <div class="{{ ($message->from == Auth::id()) ? 'sent_msg' : 'received_withd_msg' }}">
                    <p>{{ $message->message }}</p>
                    <span class="time_date">{{ date('h:i  | M d', strtotime($message->created_at)) }}</span>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<div class="type_content">
  <div class="type_msg">
    <div class="input-text">
      <input type="text" name="message" class="write_msg" placeholder="Type a message">
      <button class="msg_send_btn" disabled><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
    </div>
  </div>
<div>

</div>