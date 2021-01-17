@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;padding: 4px;">
  <a class="btn btn-primary btn-sm" style="margin-right: 15px; margin-top: 5px;" href="<?= route("qlsv_worktask.index") ?>">
    <i class="glyphicon glyphicon-list-alt"></i></a>
</div>
<div class="container-fluid py-5">
  <div class="row" style="padding: 4px;">
    <div class="col-md-10 mx-auto">
      <form method="post" action="{{ route('qlsv_worktask.store')}}">
        @csrf
        <div class="form-group row">
          <div class="col-sm-6">
            <label for="">Tên worktask</label>
            <input type="text" class="form-control" id="" name="tenworktask" placeholder="nhập tên worktask" />
          </div>


          <div class="col-sm-6">
            <label for="">Thứ tự worktask</label>
            <input type="number" class="form-control" value={{$worktask}} id="thutu" name="thutu" placeholder="nhập thứ tự worktask" />
          </div>


        </div>


        <div class="form-group row">
          <div class="col-sm-6">
            <label for="">Tên môn học</label>
            <select name="id_monhoc" id="monhoc1" class="form-control">
              @foreach($monhoc as $key=>$mh)
              <option value={{$key}}> {{$mh}} </option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-6">

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
        </div>



        <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i> Thêm
          mới</button>



      </form>
    </div>
  </div>
</div>
</body>
<script type="text/javascript">
  $(document).ready(function() {
    $("#monhoc1").change(function(e) {
      e.preventDefault();


      // var _token = $("input[name='_token']").val();
      // var name = $("input[name='id_monhoc']").value;
      var name = document.getElementById("monhoc1").value;

      alert(name);
      $.ajax({
        url: '/worktask/show',
        type: 'GET',
        data: {
          name: name
        },
        success: function(data) {

          alert(data.success);
          document.getElementById("thutu").value = data.success;

        }
      });


    });
  });
</script>
@endsection