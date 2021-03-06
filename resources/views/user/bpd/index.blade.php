@extends('user.layouts.master')

@section('style')
<style>
  :root {
        --level-1: #8dccad;
        --level-2: #f5cc7f;
        --level-3: #7b9fe0;
        --level-4: #f27c8d;
        --black: black;
        }

        * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        }

        ol {
        list-style: none;
        }

        #susunan {
        margin: 50px 180px;
        text-align: center;
        font-family: "Inter", sans-serif;
        }

        .container {
        max-width: 1000px;
        padding: 0 10px;
        margin: 0 auto;
        }

        .rectangle {
        position: relative;
        padding: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }


        /* LEVEL-1 STYLES
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        .level-1 {
        width: 50%;
        margin: 0 auto 40px;
        background: var(--level-1);
        }

        .level-1::before {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%);
        width: 2px;
        height: 20px;
        background: var(--black);
        }


        /* LEVEL-2 STYLES
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        .level-2-wrapper {
        position: relative;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        }

        .level-2-wrapper::before {
        content: "";
        position: absolute;
        top: -20px;
        left: 27.3%;
        width: 48.5%;
        height: 2px;
        background: var(--black);
        }

        .level-2-wrapper::after {
        display: none;
        content: "";
        position: absolute;
        left: -20px;
        bottom: -20px;
        width: calc(100% + 20px);
        height: 2px;
        background: var(--black);
        }

        .level-2-wrapper li {
        position: relative;
        }

        .level-2-wrapper > li::before {
        content: "";
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        width: 2px;
        height: 20px;
        background: var(--black);
        }

        .level-2 {
        width: 70%;
        margin: 0 auto 40px;
        background: var(--level-2);
        }

        .level-2::before {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%);
        width: 2px;
        height: 20px;
        background: var(--black);
        }

        .level-2::after {
        display: none;
        content: "";
        position: absolute;
        top: 50%;
        left: 0%;
        transform: translate(-100%, -50%);
        width: 20px;
        height: 2px;
        background: var(--black);
        }


        /* LEVEL-3 STYLES
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        .level-3-wrapper {
        position: relative;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-column-gap: 20px;
        width: 90%;
        margin: 0 auto;
        }

        .level-3-wrapper::before {
        content: "";
        position: absolute;
        top: -20px;
        left: calc(30% - 2px);
        width: calc(45% + 15px);
        height: 2px;
        background: var(--black);
        }

        .level-3-wrapper > li::before {
        content: "";
        position: absolute;
        top: 0;
        left: 50%;
        transform: translate(-50%, -100%);
        width: 2px;
        height: 20px;
        background: var(--black);
        }

        .level-3 {
        margin-bottom: 20px;
        background: var(--level-3);
        }


        /* LEVEL-4 STYLES
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        .level-4-wrapper {
        position: relative;
        width: 80%;
        margin-left: auto;
        }

        .level-4-wrapper::before {
        content: "";
        position: absolute;
        top: -20px;
        left: -20px;
        width: 2px;
        height: calc(100% + 20px);
        background: var(--black);
        }

        .level-4-wrapper li + li {
        margin-top: 20px;
        }

        .level-4 {
        font-weight: normal;
        background: var(--level-4);
        }

        .level-4::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 0%;
        transform: translate(-100%, -50%);
        width: 20px;
        height: 2px;
        background: var(--black);
        }


        /* MQ STYLES
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        @media screen and (max-width: 700px) {
        .rectangle {
            padding: 20px 10px;
        }

        .level-1,
        .level-2 {
            width: 100%;
        }

        .level-1 {
            margin-bottom: 20px;
        }

        .level-1::before,
        .level-2-wrapper > li::before {
            display: none;
        }
        
        .level-2-wrapper,
        .level-2-wrapper::after,
        .level-2::after {
            display: block;
        }

        .level-2-wrapper {
            width: 90%;
            margin-left: 10%;
        }

        .level-2-wrapper::before {
            left: -20px;
            width: 2px;
            height: calc(100% + 40px);
        }

        .level-2-wrapper > li:not(:first-child) {
            margin-top: 50px;
        }
</style>
    
@endsection

@section('content')


  <h2 class="text-center mt-3">BPD</h2>

  
    <div class="container" id="susunan">
      <div class="level-1 rectangle">
        <h1>Ketua</h1>
        <img src="{{ asset('../storage/gambar_bpd/' . $kepala['picture'] )}}" class="img-thumbnail my-2" width="400" height="800" alt="{{ $kepala['picture'] }}">
        <h1 class="fs-4">{{ $kepala['name'] }}</h1>
      </div>
      <ol class="level-2-wrapper">
        <li>
          <div class="level-2 rectangle">
            <h2>Wakil Ketua</h2>
            <img src="{{ asset('../storage/gambar_bpd/' . $wakil_kepala['picture'] )}}" class="img-thumbnail my-2" width="400" height="800" alt="{{ $wakil_kepala['picture'] }}">
            <h2 class="fs-4">{{ $wakil_kepala['name'] }}</h2>
          </div>
          <ol class="level-3-wrapper">
            <li>
              <div class="level-3 rectangle">
                <h3>Anggota</h3>
                <img src="{{ asset('../storage/gambar_bpd/' . $anggota_1['picture'] )}}" class="img-thumbnail my-2" width="400" height="800" alt="{{ $anggota_1['picture'] }}">
                <h3 class="fs-4">{{ $anggota_1['name'] }}</h3>
                </div>
            </li>
            <li>
              <div class="level-3 rectangle">
                <h3>Anggota</h3>
                <img src="{{ asset('../storage/gambar_bpd/' . $anggota_2['picture'] )}}" class="img-thumbnail my-2" width="400" height="800" alt="{{ $anggota_2['picture'] }}">
                <h3 class="fs-4">{{ $anggota_2['name'] }}</h3>
                </div>
                </li>
                </ol>
                </li>
        <li>
          <div class="level-2 rectangle">
            <h2>Sekretaris</h2>
            <img src="{{ asset('../storage/gambar_bpd/' . $sekretaris['picture'] )}}" class="img-thumbnail my-2" width="400" height="800" alt="{{ $sekretaris['picture'] }}">
            <h2 class="fs-4">{{ $sekretaris['name'] }}</h2>
            </div>
            <ol class="level-3-wrapper">
              <li>
                <div class="level-3 rectangle">
                <h3>Anggota</h3>
                <img src="{{ asset('../storage/gambar_bpd/' . $anggota_3['picture'] )}}" class="img-thumbnail my-2" width="400" height="800" alt="{{ $anggota_3['picture'] }}">
                <h3 class="fs-4">{{ $anggota_3['name'] }}</h3>
              </div>
            </li>
            <li>
              <div class="level-3 rectangle">
                <h3>Anggota</h3>
                <img src="{{ asset('../storage/gambar_bpd/' . $anggota_4['picture'] )}}" class="img-thumbnail my-2" width="400" height="800" alt="{{ $anggota_4['picture'] }}">
                <h3 class="fs-4">{{ $anggota_4['name'] }}</h3>
              </div>
            </li>
          </ol>
        </li>
      </ol>
    </div>

@endsection