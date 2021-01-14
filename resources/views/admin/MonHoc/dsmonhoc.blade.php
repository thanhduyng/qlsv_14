@extends('layouts.trangchu')

@section('content')

<div style="text-align:right;background-color:#f3ecec;padding: 4px;">
    <a class="btn btn-primary btn-sm" href="#searcharea" data-toggle="collapse">
        <i class="glyphicon glyphicon-search"></i></a>
    <a class="btn btn-success btn-sm" href="{{route('qlsv_monhoc.create')}}">
        <i class="glyphicon glyphicon-plus"></i></a>

</div>

<div id="searcharea" class="collapse">
    <form action="<?= route("qlsv_monhoc.search") ?>" method="get" class="row p-3">
        <div class="form-group row" style="margin: 25px;">
            <div class="col-sm-6 col-xs-6">
                <label>Môn học</label>

                <select name="id" id="monhoc" class="form-control">
                    <option value="">--Chọn môn học--</option>

                    @if($monhoc1->count())

                    @foreach($monhoc1 as $cl )
                    <option value="{{$cl->id}}">{{$cl->tenmonhoc}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="col-sm-6 col-xs-6">
                <label>Tên Môn Học</label>
                <input class="form-control" id="tenmonhoc" type="text" value="{{$tenmonhoc ?? '' }}" name="tenmonhoc" placeholder="Nhập Tên môn học">
            </div>
            <div class="tab" id="searchResult">
            </div>
            <div class="col-sm-12">
                <button type="submit" id="timkiem" class="btn btn-primary btn-sm" style="float: right;
    margin-top: 10px;">Tìm kiếm</button>
            </div>
        </div>
    </form>
</div>
<div>
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Môn Học Ghi Chú </th>

                <th>Xóa Sửa</th>

            </tr>
        </thead>
        <tbody>
            @if($monhoc->count())
            @foreach($monhoc as $i =>$mh )
            <tr>
                <td>
                    {{$i+1}}
                </td>
                <td>
                    {{$mh->tenmonhoc}}<br>
                    <i>{{$mh->ghichu}}</i><br>
                    <i><a class="btn btn-primary px-4 float-right" href="{{route('qlsv_worktask.mon',$mh->id)}}">worktask</a></i>
                </td>
                <td style="padding-left:0;line-height: 33px;">
                    <a class="btn-default btn-xs" href="{{route('qlsv_monhoc.edit',$mh->id)}}"">
                        <i class=" glyphicon glyphicon-pencil"></i></a>
                    <a class="btn-default btn-xs" href="{{route('qlsv_monhoc.destroy',$mh->id)}}">
                        <i class="glyphicon glyphicon-trash"></i></a>
                </td>
               
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    <div class="text-center">
        {{ $monhoc->links() }}
    </div>

</div>
<script>
    /*  $(function(e) {
        $("#chkCheckAll").click(function() {
            $(".checkBoxClass").prop('checked', $(this).prop('checked'));
        });
    });*/
</script>

<script type="text/javascript">
    /*  $(document).ready(function() {


        $('#master').on('click', function(e) {
            if ($(this).is(':checked', true)) {
                $(".sub_chk").prop('checked', true);
            } else {
                $(".sub_chk").prop('checked', false);
            }
        });


        $('.delete_all').on('click', function(e) {


            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });


            if (allVals.length <= 0) {
                alert("Vui lòng chọn hàng");
            } else {


                var check = confirm("Bạn có chắc chắn muốn xóa hàng này không ? ");
                if (check == true) {


                    var join_selected_values = allVals.join(",");


                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: 'ids=' + join_selected_values,
                        success: function(data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Rất tiếc, đã xảy ra lỗi !!');
                            }
                        },
                        error: function(data) {
                            alert(data.responseText);
                        }
                    });


                    $.each(allVals, function(index, value) {
                        $('table tr').filter("[data-row-id='" + value + "']").remove();
                    });
                }
            }
        });


        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function(event, element) {
                element.trigger('confirm');
            }
        });


        $(document).on('confirm', function(e) {
            var ele = e.target;
            e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Rất tiếc, đã xảy ra lỗi !!');
                    }
                },
                error: function(data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
    });*/
</script>
@endsection