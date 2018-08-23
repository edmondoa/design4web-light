		@include('admin.header')
		<style>

        #userslists ul {width:100%;  clear: both; list-style: none; border-bottom: 1px solid #fff}
        #userslists ul li { float: left; padding: 5px;  }
        #userslists ul li:first-child {width:285px;}


        #userslists ul li:nth-child(2) {width:250px; text-align: center;}
        #userslists ul li:nth-child(3) {width:70px; text-align: center;}
      
        #userslists ul li:nth-child(4) {width:95px; text-align: center;}
        #userslists ul li:nth-child(5) {width:90px; text-align: center;}
        #userslists ul li:nth-child(6) {width:60px; text-align: center;}

        #userslists { margin-bottom: 20px; }

		</style>

	
		
		@include('admin.menu')
        <div class="block-wrap padz">
		
       

			<div id="userslists">
            <h1>Userlists</h1>           
            <ul >

                <li><b>Name</b></li>
                <li><b>Email</b></li>
          
                <li><b>Country </b></li>

                 <li><b>action</b></li>
                <li><b>action</b></li>
            </ul>
          
                
            </div>

        @foreach($users as $user)
			<div id="userslists">
           
			<ul >
				<li>{{ $user->name }}  <span style="margin-left:20px; color:gray;"><i>{{ $user->action}} </i></span>  </li>

              
				<li>{{ $user->email }} </li>
				<li>{{ $user->country }} </li>
               
					 @if ($user->action == "active")
					  <li> <a href="/admin/users/action/?act=suspend&i={{ $user->id }}">suspend</a></li>
					@else
					  <li> <a href="/admin/users/action/?act=unsuspend&i={{ $user->id }}">unsuspend</a></li>
					@endif
                <li>    <a href="/admin/users/action/?act=delete&i={{ $user->id }}">delete</a></li>
			</ul>
          
			</div>

			  @endforeach

           

        </div>
		@include('admin.footer')

