<style>
.MainContent {width: 100%;}
.TableRecords {width: 80%; margin: 20px auto;}
.TableRecords tr th, td{border-collapse: collapse; border-spacing: 5px; padding: 10px;}
</style>
<div class="MainContent">
    <table class="TableRecords">
        <thead>
            <tr class="TableRecords_Header">
                <th><?=$this->model->getLabel("id")?></th>
                <th><?=$this->model->getLabel("title")?></th>
                <th><?=$this->model->getLabel("status")?></th>
                <th><?=$this->model->getLabel("inserter")?></th>
                <th><?=$this->model->getLabel("updated")?></th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($this->models as $item): $u = Users::model()->find("id = :id", array(":id" => $item->inserter)); ?>
                <tr>
                    <td><?=$item->id?></td>
                    <td><?=$item->title?></td>
                    <td><?=$item->status == 1 ? "Enable" : "Disable"?></td>
                    <td><?= $u == false ? "" : $u->username ?></td>
                    <td><?=$item->updated?></td>
                    <td>&nbsp;</td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>