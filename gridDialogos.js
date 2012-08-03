Ext.define('Dialogos', {
    extend: 'Ext.data.Model',
    fields: [
        {name: 'POS',        type: 'string'},
        {name: 'Nome',       type: 'string'},
        {name: 'Estado',     type: 'string'},
        {name: 'por',        type: 'string'},
        {name: 'em',         type: 'string'}
    ],
});

function iconeEstado(val){
    if(val == 'ok'){
        return "<img src=\"img/i_ok.png\" />";
    }else{
        return "<img src=\"img/i_no_ok.png\" />";
    }
}

function criarGridDialogos(arc, msbt) {

    // create the Grid
    var grid = Ext.create('Ext.grid.Panel', {
        store: Ext.create('Ext.data.Store',{
            model: 'Dialogos',
            proxy: {
                type: 'ajax',
                url: 'get.php?quero=pos&msbt=' + msbt,

                reader: {
                    type: 'json'
                    //root: '',
                    //record: ''
                }
            },
            autoLoad: true
        }),

        stateful: true,
        stateId: 'stateGrid',
        columns: [
        {
            text     : 'POS',
            width    : 50,
            sortable : true,
            dataIndex: 'POS'
        },
        {
            text     : 'Nome',
//            width    : 75,
            sortable : true,
            //                renderer : 'usMoney',
            dataIndex: 'Nome'
        },
        {
            text     : 'Estado',
//            width    : 75,
            sortable : true,
            renderer : iconeEstado,
            dataIndex: 'Estado'
        },
        {
            text     : 'ultima alteração',
//            width    : 75,
            sortable : true,
            dataIndex: 'por'
        },
        {
            text     : 'em',
//            width    : 85,
            sortable : true,
            dataIndex: 'em'
        }
        ],
//        height: 350,
//        width: 600,
//        title: 'Lista de Dialogos',
        //renderTo: Ext.getBody(),
        viewConfig: {
            stripeRows: true,
            enableTextSelection: false
        },
        listeners: {
            beforeitemclick: function(view, record, item, index, event) {
                var pos = record.get('POS');
                var onde = Ext.get('p' + msbt);
                criarWindowDialogo(arc, msbt, pos);
            }
        }

    });
    return grid;
}
