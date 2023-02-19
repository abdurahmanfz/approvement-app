<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    let colors = {
        'new': 'gray',
        'approved': 'blue',
        'rejected': 'red',
        'finished': 'green'
    }

    let trigerDelete = (data) => {
        localStorage.setItem('deletedTaskId', data);
    }

    let deleteTask = () => {
        let deletedId = localStorage.getItem('deletedTaskId')
        axios({
            url: '/api/task/' + deletedId,
            method: 'DELETE',
        }).then(res => {
            console.log('res', res);
        }).catch(
            err => console.log('error from catch', err)
        ).finally(
            window.location.reload()
        )
    }

    let showTask = (id) => {
        axios({
            url: '/api/task/' + id,
            method: 'GET',
        }).then(res => {
            let task = res.data

            $('#detail_tasks_name').val(task.tasks_name)
            $('#detail_description').html(task.description)
            $('#detail_file').val(task.file)

            // child free.
            $('#detail_task_history').empty()

            for (const x in task.approvements) {
                if (Object.hasOwnProperty.call(task.approvements, x)) {
                    const element = task.approvements[x]
                    const color = colors[element.status]
                    const created_at = element.created_at.slice(0,16).replace('T', ' | ')

                    let cardEl = '<div class="p-4 mb-4 text-sm text-'+color+'-800 rounded-lg bg-'+color+'-50 dark:bg-gray-800 dark:text-'+color+'-400"><span class="font-bold">'+element.status+'!</span> <br> ' +element.notes+ '</div>'

                    let stepEl = '<div class="p-4 mb-4 text-sm text-'+color+'-800 rounded-lg bg-'+color+'-50 dark:bg-gray-800 dark:text-'+color+'-400"><span class="font-bold">Step - '+(x*1+1)+'</span> <br>' + created_at+ '</div>'

                    let alias = '<div class="grid grid-cols-3 gap-4"><div class="col-span-2">'+cardEl+'</div><div class="">'+stepEl+'</div></div>'

                    console.log(alias);
                    $('#detail_task_history').append(alias)
                }
            }
        }).catch(
            err => console.log('error from catch', err)
        )
    }

    let editTask = (id) => {
        localStorage.setItem('updatedId', id)
        axios({
            url: '/api/task/' + id,
            method: 'GET',
        }).then(res => {
            let task = res.data

            let tasks_name = $('#update_task_tasks_name').val(task.tasks_name)
            let description = $('#update_task_description').html(task.description)
            let filebefore = $('#update_task_filebefore').html(' - ' + task.file)

            console.log($('#update_task_tasks_name'));
        }).catch(
            err => console.log('error from catch', err)
        )
    }

    let updateTask = () => {
        axios({
            url: '/api/task/' + localStorage.getItem('updatedId'),
            method: 'PATCH',
            data: {
                tasks_name: $('#update_task_tasks_name').val(),
                file: null,
                description: $('#update_task_description').val(),
            }
        }).then(res => {
            console.log($('res'));
        }).catch(
            err => console.log('error from catch', err)
        ).finally(
            window.location.reload()
        )
    }

    let setApprovementId = (id, name) => {
        $('#taskid').val(id)
        $('#task_name').val(name)
    }
</script>

</html>