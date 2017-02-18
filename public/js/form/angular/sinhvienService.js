/**
 * Created by hungnv on 2/5/2017.
 */
    app.service('sinhvienService',['$resource', function ($resource) {

        this.api= function () {
            return $resource('/api/sinhviens/:id');
        }
    }]) ;
