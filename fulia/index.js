$(document).ready(function() {

    var materias = {
        registros: [],

        init: function(){
            this.setRegistros();

        },
        setRegistros: function(){
            this.registros.push( {id:10, url:"primeira"}  );
            this.registros.push( {id:20, url:"segunda"}  );
            this.registros.push( {id:30, url:"terceira"}  );
        },
        retMateria: function(chave){
            return this.registros[chave];
        }
    }
    materias.init();


    var ctrPercorre = {
        total_registros: 0,
        registro_atual: 0,
        btnDir: $("#ctr-percorre-dir"),
        btnEsq: $("#ctr-percorre-esq"),
        init: function(){
            this.setBtnDir();
            this.setBtnEsq();
            this.setTotalRegistros();
        },
        setTotalRegistros: function(){
            this.total_registros = 3;
        },
        setBtnDir: function(){
            var me = this;
            this.btnDir.click(function(event){
                event.preventDefault();
                if(me.registro_atual < (me.total_registros-1) ){
                    me.registro_atual = me.registro_atual+1;
                    console.log(materias.retMateria(me.registro_atual).id);
                }
            });
        },
        setBtnEsq: function(){
            var me = this;
            this.btnEsq.click(function(event){
                event.preventDefault();
                if(me.registro_atual > 0){
                    me.registro_atual = me.registro_atual-1;
                    console.log(materias.retMateria(me.registro_atual).id);
                }
            });
        }
    };
    ctrPercorre.init();


});