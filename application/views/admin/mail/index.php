<div class="content-wrapper">
<?php if ($role == false): ?>
    <section class="content-header">
        <h1>
            Bạn không được phân quyền
        </h1>
    </section>
<?php else: ?>

    <section class="content-header">
        <h1>
            Danh sách mail gửi
        </h1>
    </section>
    <section class="content">
    <div class="row">
    <div class="col-xs-12">
    <div class="box box-body">

    <label id="resultsearch" style="color: red;"></label>

    <div class="box-body">
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Nickname:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" class="form-control"
                           id="nickname" value="<?php echo $this->input->get('username') ?>" name="username">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <input type="button" id="search_tran" value="Tìm kiếm" class="btn btn-success">
                </div>
            </div>

        </div>
    </div>

    <div class="box-body  table-responsive no-padding">
        <?php $this->load->view('admin/message', $this->data); ?>
        <?php $this->load->view('admin/error', $this->data); ?>
        <div class="row">
            <div class="col-sm-12">
                <table id="example2" class="table  table-bordered table-hover">
                    <thead>
                    <tr>
                        <td>STT</td>
                        <td>Tiêu đề</td>
                        <td>Người gửi</td>
                        <td>Content</td>
                        <td>Ngày tạo</td>
                    </tr>
                    </thead>
                    <tbody id="logaction">

                    </tbody>
                </table>
            </div>
        </div>
        <div id="spinner" class="spinner" style="display:none;">
            <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
        </div>
        <div class="text-center">
            <ul id="pagination-demosearch" class="pagination-sm"></ul>
        </div>

    </div>
    </div>
    </div>
    </div>
    </section>
<?php endif; ?>
</div>

<script>
$("#search_tran").click(function () {
    if($("#nickname").val() == ""){
        alert('Bạn phải nhập nickname');
        return false;
    }
    $('#pagination-demosearch').css("display", "block");
    $("#spinner").show();
    $.ajax({
        type: "POST",
        url: "<?php echo admin_url('mail/indexajax')?>",
        // url: "http://192.168.0.251:8082/api_backend",
        data: {
            nickname : $("#nickname").val(),
            pages : 1
        },
        dataType: 'json',
        success: function (result) {
            $("#spinner").hide();
            var totalPage = result.totalPages;
            console.log(totalPage);
            if (result.transactions == "") {
                $('#pagination-demosearch').css("display", "none");
                $("#resultsearch").html("Không tìm thấy kết quả");
            } else {
                $("#resultsearch").html("");
                $('#pagination-demosearch').twbsPagination({
                    totalPages: totalPage,
                    visiblePages: 5,
                    onPageClick: function (event, page) {
                        $("#spinner").show();
                        $.ajax({
                            type: "POST",
                            url: "<?php echo admin_url('mail/indexajax')?>",
                            // url: "http://192.168.0.251:8082/api_backend",
                            data: {
                                nickname : $("#nickname").val(),
                                pages : page
                            },
                            dataType: 'json',
                            success: function (result) {
                                $("#spinner").hide();
                                stt = 1;
                                $.each(result.transactions, function (index, value) {
                                    result += resultSearchTransction(stt,value.title, value.author, value.content, value.createTime);
                                    stt++
                                });
                                $('#logaction').html(result);
                            }
                        });
                    }
                });
            }
            stt = 1;
            $.each(result.transactions, function (index, value) {
                result += resultSearchTransction(stt,value.title, value.author, value.content, value.createTime);
                stt++
            });
            $('#logaction').html(result);
        }
    })
});
function resultSearchTransction(stt,title,user,content,date) {
    var rs = "";
    rs += "<tr>";
    rs += "<td>" + stt + "</td>";
    rs += "<td>" + title + "</td>";
    rs += "<td>" + user + "</td>";
    rs += "<td>" + content + "</td>";
    rs += "<td>" + date + "</td>";
    rs += "</tr>";
    return rs;
}

</script>