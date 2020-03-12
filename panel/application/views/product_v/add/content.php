<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title">Yeni Ürün Ekleme Sayfası</h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <div class="m-b-lg">
                    <small>
                        Yeni Ürün ekleme Sayfasında Lütfen Boş Alan Bırakmayınız...
                    </small>
                </div>
                <form action="<?= base_url("product/save"); ?>" method="post">
                    <div class="form-group">
                        <label for="title">Başlık</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Başlık Giriniz">
                        <?php if(isset($form_error)){ ?>
                               <small class="input-form-error pull-right"><?= form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="title">Başlık</label>
                        <textarea class="m-0" data-plugin="summernote" name="description" data-options="{height: 250}" placeholder="Başlık Giriniz"></textarea>
                        <?php if(isset($form_error)){ ?>
                            <small class="input-form-error pull-right"><?= form_error("description"); ?></small>
                        <?php } ?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-md">Kaydet</button>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div><!-- .row -->