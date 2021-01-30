<html>
<body>
<br/>
<div class="container">
<h3 align="center">File Uploading In Laravel</h3>
<br/>

@if(count($errors)>0)
<div class='alert alert-danger'>
Upload Validation Error<br><br>
<ul> 
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>

@endif

@if($message=Session::get('success'))
<div class='alert alert-success alert-block'>
<button type="button" class='close' data-dismiss="alert">X</button>
<strong>{{$message}}</strong>
<strong>HEYYYY {{Session::get('path')}}</strong>
</div>
<img src="/images/{{Session::get('path')}}" width="300"/>

<img src="C:/xampp/tmp/phpB371.tmp" width="300"/>
@endif
<form method="post" action="{{url('/uploadfile')}}" enctype="multipart/form-data">
{{csrf_field()}}
<div class="form-grou">
<table class='table'>
<tr>
<td width="40%" align="right"><label>Select file for upload</label></td>
<td width="30"><input type="file" name="select_file"></td>
<td width="30%" align="left"><input type="submit" name="upload" class="btn-primary" value="Upload"></td>
</tr>

<tr>
<td width="40%" align="right"></td>
<td width="30"><span class="text-muted">jpeg,jpg,png,gif</span></td>
<td width="30%" align="left"></td>
</tr>

</form>
<br/>
</body>
</html>