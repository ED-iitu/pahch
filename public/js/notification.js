function showNotification(type,message) {
    switch(type){
        case "success": {
            Snackbar.show({
                text: message,
                actionTextColor: '#fff',
                backgroundColor: '#8dbf42',
                pos: 'top-right',
            });
            break;
        }
        case "error":{
            Snackbar.show({
                text: message,
                actionTextColor: '#fff',
                backgroundColor: '#e7515a',
                pos: 'top-right',
            });
            break;
        }
        default: {
            Snackbar.show({
                text: message,
                actionTextColor: '#fff',
                backgroundColor: '#e7515a',
                pos: 'top-right',
            });
        }
    }
}