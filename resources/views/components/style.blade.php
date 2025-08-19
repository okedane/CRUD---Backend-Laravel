<style>
    #table1 {
        table-layout: fixed;
        /* Paksa patuhi lebar kolom */
        width: 100%;
    }

    #table1 th:nth-child(1) {
        width: 5%;
    }

    #table1 th:nth-child(2) {
        width: 60%;
    }

    #table1 th:nth-child(3) {
        width: 30%;
    }

    /* Optional: biar teks panjang terpotong dan ada ... */
    #table1 td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
