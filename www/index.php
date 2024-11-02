<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>

    .w-auto
    {
        width: auto !important;
    }
    h8
    {
        font-size: 0.875rem;
    }
    h9
    {
        font-size: 0.825rem;
    }

</style>

<div class="d-flex flex-row w-auto justify-content-start" id="container"></div>

<script type="text/javascript">

    async function fetchRecords()
    {
        try
        {
            const container = document.getElementById('container');
            const response = await fetch('list_files.php');
            const records = await response.json();

            for (const data of records)
            {
                const response = await fetch(`records/${data}`);
                const record_info = await response.json();
                const record_layout = await fetch(`record.html`);
                container.innerHTML += await record_layout.text();

                let current_record = container.lastElementChild;
                current_record.querySelector('#cover').src = record_info.cover;
                current_record.querySelector('#album_name').innerHTML = record_info.album_name;
                current_record.querySelector('#artist').innerHTML = record_info.artist;
                current_record.querySelector('#year').innerHTML = record_info.year;
            }
        }
        catch (error)
        {
            console.error('Error fetching the records:', error);
        }
    }
    fetchRecords();

</script>