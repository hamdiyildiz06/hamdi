<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <header class="widget-header">
                <h4 class="widget-title">Ürün Listesi
                    <a href="<?= base_url("product/new_form"); ?>" class="btn btn-xs pull-right btn-outline btn-primary"><i class="fa fa-plus"></i> Yeni Ekle</a>
                </h4>
            </header><!-- .widget-header -->
            <hr class="widget-separator">
            <div class="widget-body">
                <div class="table-responsive">
                    <table id="default-datatable" data-plugin="DataTable" class="table table-hover table-striped" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="text-center">id</th>
                            <th class="text-center">url</th>
                            <th class="text-center">Başlık</th>
                            <th class="text-center">Açıklama</th>
                            <th class="text-center">Durum</th>
                            <th class="text-center">İşlem</th>
                        </tr>
                        </thead>
<!--                        <tfoot>-->
<!--                        <tr>-->
<!--                            <th class="text-center">id</th>-->
<!--                            <th class="text-center">url</th>-->
<!--                            <th class="text-center">Başlık</th>-->
<!--                            <th class="text-center">Açıklama</th>-->
<!--                            <th class="text-center">Durum</th>-->
<!--                            <th class="text-center">İşlem</th>-->
<!--                        </tr>-->
<!--                        </tfoot>-->
                        <tbody>
                        <?php foreach ($items as $item): ?>
                            <tr>
                                <td><?= $item->id; ?></td>
                                <td><?= $item->url; ?></td>
                                <td><?= $item->title; ?></td>
                                <td><?= $item->description; ?></td>
                                <td>
                                    <input id="switch-2-2" type="checkbox" data-switchery data-color="#10c469" checked />
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url("product/delete/{$item->id}"); ?>" class="btn btn-sm btn-outline btn-danger ">
                                        <i class="fa fa-trash-o"></i> Sil
                                    </a>
                                    <a href="<?= base_url("product/update_form/{$item->id}"); ?>" class="btn btn-sm btn-outline btn-info ">
                                        <i class="fa fa-pencil-square-o"></i> Düzenle
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>