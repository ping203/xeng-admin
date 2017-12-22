<div class="content-wrapper">
        <section class="content-header">
            <h1>
                Thêm mới chiến dịch
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body">

                        <label id="resultsearch" style="color: red;"></label>

                        <div class="box-body">
                            <form id="form_marketing" class="form" enctype="multipart/form-data" method="post"
                                  action="">

                                <fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1 col-sm-2 col-xs-12">
                                                <label for="exampleInputEmail1">URL của trang web :</label>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <input type="text" id="url_web" name="url_web" class="form-control"
                                                       value="<?php echo set_value('url_web') ?>">
                                                <label>(ví dụ: http://www.urchin.com/download.html)</label>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <label style="color: red"><?php echo form_error('url_web') ?></label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1 col-sm-2 col-xs-12">
                                                <label for="exampleInputEmail1">Nguồn chiến dịch:</label>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <select name="utm_source" class="form-control">
                                                    <option value=""></option>
                                                    <?php foreach ($utm_source as $row): ?>
                                                        <option
                                                            value="<?php echo $row->name ?>"><?php echo $row->name ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label>(Liên kết giới thiệu: google, citysearch, newsletter4)</label>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <label style="color: red"><?php echo form_error('utm_source') ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1 col-sm-2 col-xs-12">
                                                <label for="exampleInputEmail1">Phương tiện chiến dịch :</label>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <select name="utm_medium" value="<?php echo set_value('utm_medium') ?>"
                                                        class="form-control">
                                                    <option value=""></option>
                                                    <?php foreach ($utm_medium as $row): ?>
                                                        <option
                                                            value="<?php echo $row->name ?>"><?php echo $row->name ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label>(Phương tiện tiếp thị: cpc, biểu ngữ, email)</label>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <label style="color: red"><?php echo form_error('utm_medium') ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1 col-sm-2 col-xs-12">
                                                <label for="exampleInputEmail1">Từ khóa chiến dịch :</label>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <input type="text" id="utm_term" name="utm_term" class="form-control"
                                                       value="<?php echo set_value('utm_term') ?>">
                                                <label>(Nhận dạng các từ khóa phải trả tiền)</label>
                                            </div>

                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <label style="color: red"><?php echo form_error('utm_term') ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1 col-sm-2 col-xs-12">
                                                <label for="exampleInputEmail1">Nội dung chiến dịch:</label>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <input type="text" id="utm_content" name="utm_content"
                                                       class="form-control"
                                                       value="<?php echo set_value('utm_content') ?>">
                                                <label>(Sử dụng để phân biệt quảng cáo)</label>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <label
                                                    style="color: red"><?php echo form_error('utm_content') ?></label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1 col-sm-2 col-xs-12">
                                                <label for="exampleInputEmail1">Tên chiến dịch:</label>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <select name="utm_campaign" class="form-control">
                                                    <option value=""></option>
                                                    <?php foreach ($utm_campain as $row): ?>
                                                        <option
                                                            value="<?php echo $row->name ?>"><?php echo $row->name ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <label>(Sản phẩm, mã khuyến mại hoặc khẩu hiệu)</label>
                                            </div>
                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <label
                                                    style="color: red"><?php echo form_error('utm_campaign') ?></label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1 col-sm-2 col-xs-12">
                                            </div>
                                            <div class="col-md-1 col-sm-2 col-xs-12">
                                                <input type="submit" class="btn btn-success" id="btnCreate"
                                                       name="btnCreate" value="Tạo url">
                                            </div>

                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>

                        <div class="box-body">
                            <?php $this->load->view('admin/message', $this->data); ?>
                            <?php $this->load->view('admin/error', $this->data); ?>
                            <div id="spinner" class="spinner" style="display:none;">
                                <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>"
                                     alt="Loading"/>
                            </div>
                            <div class="text-center">
                                <ul id="pagination-demo" class="pagination-sm"></ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>






