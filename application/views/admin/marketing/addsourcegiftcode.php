<!-- head -->

<div class="content-wrapper">
        <section class="content-header">
            <h1>
                Thêm mới nguồn giftcode
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body">

                        <label id="resultsearch" style="color: red;"></label>

                        <div class="box-body">
                            <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1 col-sm-2 col-xs-12">
                                                <label for="exampleInputEmail1">Key giftcode:</label>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <input type="text" _autocheck="true" id="keygiftcode"
                                                       class="form-control"
                                                       value="<?php echo set_value('keygiftcode') ?>" name="keygiftcode"
                                                       maxlength="3">
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <label
                                                    style="color: red"><?php echo form_error('keygiftcode') ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1 col-sm-2 col-xs-12">
                                                <label for="exampleInputEmail1">Tên nguồn giftcode:</label>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <input type="text" _autocheck="true" id="sourcegiftcode"
                                                       class="form-control"
                                                       value="<?php echo set_value('sourcegiftcode') ?>"
                                                       name="sourcegiftcode">
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <label
                                                    style="color: red"><?php echo form_error('sourcegiftcode') ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1 col-sm-2 col-xs-12">
                                                <label for="exampleInputEmail1">Loại giftcode:</label>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <select id="typegiftcode" class="form-control"
                                                        value="<?php echo set_value('typegiftcode') ?>"
                                                        name="typegiftcode">
                                                    <option value="1">Giftcode marketing</option>
                                                    <option value="2">Giftcode minigame</option>
                                                    <option value="3">Giftcode vận hành</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <label
                                                    style="color: red"><?php echo form_error('typegiftcode') ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1 col-sm-2 col-xs-12">
                                                <label for="exampleInputEmail1">Hiển thị:</label>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <input type="checkbox" id="statusgc" name="statusgc" value="0">
                                                <input type="hidden" name="displaygc" id="displaygc" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1 col-sm-2 col-xs-12">
                                            </div>
                                            <div class="col-md-1 col-sm-2 col-xs-12">
                                                <input type="submit" class="btn btn-success" value="Thêm mới">
                                            </div>

                                        </div>
                                    </div>
                                </fieldset>
                            </form>

                        </div>


                    </div>
                </div>
            </div>
        </section>
</div>
<script>
    $(document).ready(function () {
        $("#displaygc").val($('#statusgc').val());
    });
    $('#statusgc').on('change', function () {
        this.value = this.checked ? 1 : 0;
        $("#displaygc").val(this.value);
    }).change();
</script>