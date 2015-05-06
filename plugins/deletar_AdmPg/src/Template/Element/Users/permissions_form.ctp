<div class="panel panel-default">
    <div class="panel-title">Permissões</div>
    <div class="panel-body">

        <?php 
            //Monta um array com as permissoes que ele já tem e na hora de marcar a 
            //checkbox ele checa neste array se jah tem e marca
            $myPermissions = [];
            if ($user->permissions) {
                foreach ($user->permissions as $value) {
                    $myPermissions[] = $value->controller;
                }
            }
            $i = 0;
            foreach ($sidemenuItems as $key => $value) {
                if ($value) {
                    echo "<h6>{$key}</h6>";
                    foreach ($value as $keyItem => $item) {
                        $checked = (bool)in_array($item['url']['controller'], $myPermissions);

                        echo $this->Form->input('permissions['.$i.'].controller', [
                            'hiddenField' => false,
                            'type' => 'checkbox',
                            'value' => $item['url']['controller'],
                            'label' => $item['url']['controller'],
                            'checked' => $checked
                        ]);
                        $i++;
                    }
                }
            }
        ?>
    </div>
</div>