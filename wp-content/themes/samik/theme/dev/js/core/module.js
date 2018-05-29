function module(name, callback){
    var template = document.querySelectorAll('*[data-module=' + name + ']');
    if ( template.length === 1 ){
        module[name] = ( callback.bind(template) )();
    } else {
        module[name] = [];
        for (var i = 0; i < template.length; i++){
            module[name][i] = ( callback.bind(template[i]) )();
        }
    }
}
