@extends('layouts.trangchu')

@section('content')

<head>

  <style>
    @media (max-width: 880px) {
      .plus-them {
        margin-left: 300px;
      }
    }
  </style>
</head>

<body>
  <div class="container-fuild py-5" style="margin-top: 0px; margin-bottom: 1px;">
    <div class="row" style="background-color:white; padding: 40px; padding-bottom: 80px;">

      <div class="col-md-10 mx-auto">
        <form method="post" action="{{route('qlsv_worktask.store')}}">
          @csrf
          <div class="form-group row">
            <div class="col-sm-6">
              <h4> <label class="label label-primary" for="">Tên worktask</label></h4>
              <input type="text" class="form-control" id="" name="tenworktask" placeholder="nhập tên worktask" />
            </div>
            <div class="col-sm-6">
              <h4><label class="label label-primary" for="">Tên môn học</label></h4>
              <select class="form-control" name="id_monhoc" id="monhoc1">
                @foreach($monhoc as $key=>$mh)
                <option value={{$key}}> {{$mh}} </option>
                @endforeach
              </select>

            </div>
            <div class="col-sm-6">
              <h4><label class="label label-primary" for="">Thứ tự worktask</label></h4>
              <input type="number" class="form-control" value={{$worktask}} id="thutu" name="thutu" placeholder="nhập thứ tự worktask" />
            </div>
            </br>
            <h4> <label class="label label-primary" for="">Thứ tự worktask chi tiết</label></h4>
            </br>
            <table class="table">
              <thead>
                <tr width="100%">
                  <th>STT</th>
                  <th>Tên công việc</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr width="100%">
                  <td>1</td>
                  <td>
                    <input type="text" class="form-control" name="ten[]" value="" placeholder="Enter tên worktaskdetail">
                  <td>
                </tr>
                <tr width="100%">
                  <td>2</td>
                  <td>


                    <input type="text" class="form-control" name="ten[]" value="" placeholder="Enter tên worktaskdetail">

                  <td>
                </tr>
                <tr width="100%">
                  <td>3</td>
                  <td>


                    <input type="text" class="form-control" name="ten[]" value="" placeholder="Enter tên worktaskdetail">

                  <td>
                </tr>
                <tr width="100%">
                  <td>4</td>
                  <td>


                    <input type="text" class="form-control" name="ten[]" value="" placeholder="Enter tên worktaskdetail">

                  <td>
                </tr>
                <tr width="100%">
                  <td>5</td>
                  <td>


                    <input type="text" class="form-control" name="ten[]" value="" placeholder="Enter tên worktaskdetail">

                  <td>
                </tr>
                <tr width="100%">
                  <td>6</td>
                  <td>


                    <input type="text" class="form-control" name="ten[]" value="" placeholder="Enter tên worktaskdetail">

                  <td>
                </tr>
                <tr width="100%">
                  <td>7</td>
                  <td>


                    <input type="text" class="form-control" name="ten[]" value="" placeholder="Enter tên worktaskdetail">

                  <td>
                </tr>

              </tbody>
            </table>




          </div>
          <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
          <a type="button" href="{{route('qlsv_worktask.index')}}" class="btn btn-primary px-4 float-right"><i class="glyphicon glyphicon-list-alt"></i>
            Danh sách worktask </a>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#monhoc1").change(function(e) {
        e.preventDefault();


        // var _token = $("input[name='_token']").val();
        // var name = $("input[name='id_monhoc']").value;
        var name = document.getElementById("monhoc1").value;


        $.ajax({
          url: '/worktask/show',
          type: 'GET',
          data: {
            name: name
          },
          success: function(data) {

            // alert(data.success);
            document.getElementById("thutu").value = data.success;

          }
        });


      });
    });
  </script>
  @endsection