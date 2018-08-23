@include('admin.header')
@include('admin.menu')
<div class="block-wrap padz">
<h1>Account Settings</h1>

			<div id="userslists">
			<form action="{{route('updatepasswordform')}}" method="post">
           <input name="id" type="hidden" value="{{ $users->id }}" />
			<input  type="submit" value="Change Password"/>
			
			</form>
			
			<form action="{{ route('updateaccountform')}}" method="post">
          	 <input name="id" type="hidden" value="{{  $users->id }}" />
			<input  type="submit" value="Account Information"/>
			
			</form>
			</div>

			
</div>

@include('admin.footer')