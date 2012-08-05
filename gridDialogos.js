Ext.define('Dialogos', {
    extend: 'Ext.data.Model',
    fields: [
        {name: 'pos',        type: 'string'},
        {name: 'name',       type: 'string'},
        {name: 'status',     type: 'string'},
//        {name: 'por',        type: 'string'},
        {name: 'em',         type: 'string'}
    ]
});

function iconeEstado(val){
    if(val == "1"){
        return "<div class=\"st01\"> Peding Translation</div>";
    }
    if(val == "2"){
        return "<div class=\"st02\"> Waiting for Review</div>";
    }
    if(val == "3"){
        return "<div class=\"st03\"> Review / Problems</div>";
    }
    if(val == "4"){
        return "<div class=\"st04\"> Approved</div>";
    }
    if(val == "5"){
        return "<div class=\"st05\"> Rejected</div>";
    }
    if(val == "6"){
        return "<div class=\"st06\"> Final</div>";
    }

return val;
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
            text     : 'id',
            width    : 50,
            sortable : true,
            dataIndex: 'pos'
        },
        {
            text     : 'Nome',
            width    : 150,
            sortable : true,
            //                renderer : 'usMoney',
            dataIndex: 'name'
        },
        {
            text     : 'Estado',
            width    : 150,
            sortable : true,
            renderer : iconeEstado,
            dataIndex: 'status'
        },
//        {
//            text     : 'ultima alteração',
////            width    : 75,
//            sortable : true,
//            dataIndex: 'por'
//        },
        {
            text     : 'ultima alteração',
            width    : 150,
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
                var id = record.get('id');
                var onde = Ext.get('p' + msbt);
                criarWindowDialogo(arc, msbt, id);
            }
        }

    });
    return grid;
}
