<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="icon" type="image/png" href="/img/favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/all.css" rel="stylesheet">
</head>
<body>

    <div id="app">
        <div class="container">
            <nav class="form-inline navbar bg-light">
                <select v-model="selected" class="form-group custom-select custom-select">
                    <option selected>Open this select menu</option>
                    <option value="axios">Axios</option>
                    <option value="local">Local</option>
                </select>
                <form class="form-inline">
                    <input v-model="searchName" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" @click="sortColumn('id')"><i :class="`fas fa-angle-double-${sortColMass.id ? 'down' : 'up'}`"></i></th>
                        <th scope="col" @click="sortColumn('name')">Полное Имя <i :class="`fas fa-angle-double-${sortColMass.name ? 'down' : 'up'}`"></i></th>
                        <th scope="col" @click="sortColumn('username')">Ник <i :class="`fas fa-angle-double-${sortColMass.username ? 'down' : 'up'}`"></i></th>
                        <th scope="col" @click="sortColumn('email')">email <i :class="`fas fa-angle-double-${sortColMass.email ? 'down' : 'up'}`"></i></th>
                        <th scope="col">address</th>
                        <th scope="col" @click="sortColumn('website')">website <i :class="`fas fa-angle-double-${sortColMass.website ? 'down' : 'up'}`"></i></th>
                    </tr>
                </thead>
                <tbody v-if="!loading">
                    <tr v-for="(item, index) in filteredList" :key="index">
                        <th scope="row">{{ item.id }}</th>
                        <td>{{ item.name }}</td>
                        <td>{{ item.username }}</td>
                        <td>{{ item.email }}</td>
                        <td>
                            <a :href="`https://www.google.com.ua/maps/@${item.address.geo.lat},${item.address.geo.lng},12z?hl=ru`" target="_blank">{{ item.address.city }}, {{ item.address.street }}, {{ item.address.suite }}, {{ item.address.zipcode }}</a>
                        </td>
                        <td>{{ item.website }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <script src="/js/vue.js"></script>
    <script src="https://unpkg.com/axios@0.2.1/dist/axios.min.js"></script>
    <script src="/components/root.js"></script>
</body>
</html>