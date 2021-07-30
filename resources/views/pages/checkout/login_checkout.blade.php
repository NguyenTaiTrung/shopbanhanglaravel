@extends('layout')
@section('content')

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
							<form action="{{URL::to('/login-customer')}}" method="POST">
							@if(session()->has('messages'))
				<div class="alert alert-success">
					{!! session()->get('messages') !!}
				</div>
				@elseif(session()->has('error'))
				<div class="alert alert-danger">
					{!! session()->get('error') !!}
				</div>
				   @endif
						<h2>Đăng nhập tài khoản</h2>
					
							{{csrf_field()}}
							
							<input type="text" data-validation="length" data-validation-length="min1" data-validation-error-msg="Làm ơn không để trống tên đăng nhập" name="email_account" placeholder="Tài khoản (Không được để trống!!)" />
							<input type="password" data-validation="length" data-validation-length="min1" data-validation-error-msg="Làm ơn không để trống mật khẩu" name="password_account" placeholder="Password (Không được để trống!!)" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Ghi nhớ đăng nhập
							</span>
							<span>
								<a href="{{url('/quen-mat-khau')}}">Quên mật khẩu</a>
							</span>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng ký</h2>
						<form action="{{URL::to('/add-customer')}}" method="POST">
							{{ csrf_field() }}
							<input type="text" data-validation="length" data-validation-length="min1" data-validation-error-msg="Làm ơn không để trống họ tên" name="customer_name" placeholder="Họ và tên (Không được để trống!!)"/>
							<input type="email"  data-validation="length" data-validation-length="min1" data-validation-error-msg="Làm ơn không để trống email đăng ký" name="customer_email" placeholder="Địa chỉ email (Không được để trống!!)"/>
							<input type="password"  data-validation="length" data-validation-length="min1" data-validation-error-msg="Làm ơn không để trống mật khẩu" name="customer_password" placeholder="Mật khẩu (Không được để trống!!)"/>
							<input type="text"  data-validation="length" data-validation-length="min1" data-validation-error-msg="Làm ơn không để trống số điện thoại" name="customer_phone" placeholder="Phone (Không được để trống!!)"/>
							<button type="submit" class="btn btn-default">Đăng ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection