<style>
    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        bottom: 0;
        padding-top: 80px;

        width: 200px;

        background-color: rgba(var(--secondColor), 1);
    }
    .sidebar * {
        color: rgba(var(--mainColor), .7) !important;
    }
    .side-wrapper {
        width: 100%;
    }
    .sidebar a {
        text-decoration: none;
        /* background: var(--gradientColorBg);
        background: var(--gradientColorBg2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent; */
    }
    .sidebar ul {
        list-style: none;
        margin: 0px 10px 0px 5px;
        padding: 0px;
    }
    .sidebar li button {
        background: transparent;
        border: none;
        width: 100%;
        height: 100%;
        text-align: left;

        margin: 5px 0px 5px 0px;
        padding: 15px 10px 15px 15px;
    }
    .sidebar li {
        border-bottom: 1px solid rgba(var(--mainColor), .5);

        display: flex;
        width: 100%;
        flex-direction: row;
        justify-content: start;
        align-items: center;

        cursor: pointer;

        transition: all .5s ease;
    }
    .sidebar li:hover {
        background-color: rgba(var(--fourthColor), .3);
        color: rgba(var(--mainColor), 1);
    }
    .sidebar li span {
        font-weight: 700;
    }
    .sidebar li svg {
        margin-right: 15px;
        color: var(--gradientColorBg2);
    }
    @media only screen and (max-width: 911px) {
        .sidebar {
            width: min-content;
        }
        .sidebar li {
            margin: 5px 0px 5px 0px;
            padding: 0px;
            justify-content: center;
        }
        .sidebar li span {
            display: none;
        }
        .sidebar li svg {
            margin-right: 0px;
        }
    }

</style>
@php
    $requestUrl = ['http://localhost/PWL_UAS_TESTING/inventory', 'http://localhost/PWL_UAS_TESTING/karyawan', 'http://localhost/PWL_UAS_TESTING/supplier', 'http://localhost/PWL_UAS_TESTING/gudang']    
@endphp

<nav class="sidebar">
    <div class="side-wrapper">
        <ul>
            @if(in_array(Request::url(), $requestUrl))
            <li>
                <button type="button" class="btn-add-data" data-bs-toggle="modal" data-bs-target="#modal-add">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                        <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                    </svg>
                <span>Add</span>
                </button>
            </li>
            @endif
            {{-- <li>
                <button type="button" class="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                        <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                    </svg>
                <span>Update</span>
                </button>
            </li> --}}
            {{-- <li>
                <button type="button" class="" data-bs-toggle="modal" data-bs-target="#modal-delete">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                        <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                    </svg>
                <span>Delete</span>
                </button>
            </li> --}}
        </ul>
    </div>
</nav>
