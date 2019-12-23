@extends('layouts.blank')

<!--

    top 5 guns


    kills/min -> tempo de jogo
    damage/min -> total damage
    hs% -> hs count
    kdr -> kills
    
-->

@php
    arsort($data['damage-by-weapon']);
    arsort($data['hits-by-hitgroup']);
@endphp

@section('content')
    <div class="bg-grey-800 mx-32 py-6 px-16 rounded-lg shadow-lg">
        <div class="flex flex-row">
            <!-- Top guns -->
            <div class="w-1/3">
                <h2 class="p-2 mb-4 font-light text-center text-2xl tracking-wider uppercase">Top weapons</h2>
                <table>
                    @foreach ($data['damage-by-weapon'] as $weapon => $hits)
                        <tr>
                            <td class="font-medium text-3xl text-grey-500">{{ $loop->index + 1}}</td>
                            <td class="px-3 font-csgo text-center text-2xl text-grey-700">
                                {{ csgo_getchar_by_name($weapon) }}
                            </td>
                            <td class="">
                                <div class="">
                                    <p class="font-medium uppercase">{{ $weapon }}</p>
                                    <p class="text-grey-600 font-normal tracking-tight">{{ $hits }} HP</p>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            
            <!-- Hit groups -->
            <div class="flex flex-col p-4 pt-0 w-1/3">
                <h2 class="p-2 mb-4 font-light text-center text-2xl tracking-wider uppercase">Hit groups</h2>
                
                <table>
                    @foreach ($data['hits-by-hitgroup'] as $part => $hits)
                        <tr class="text-lg">
                            <td class="text-grey-600 font-normal">{{ str_replace('_', ' ', Str::title($part)) }}</td>
                            <td class="">
                                <div class="flex items-baseline">
                                    <span class="font-medium">{{ $hits }}</span>
                                    <small class="ml-1 text-grey-600 tracking-tight">hits</small>
                                </div>
                            </td>
                            <td class="">
                                <div class="flex items-baseline">
                                    <span class="font-medium">{{ number_format($hits / $data['hits-total'] * 100, 1) }}</span>
                                    <small class="ml-1 text-grey-600 tracking-tight">%</small>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            
            <!-- Stats -->
            <div class="w-1/3">
                <h2 class="p-2 mb-4 font-light text-center text-2xl tracking-wider uppercase">Stats</h2>
                <div class="flex flex-wrap">
                    @for($i = 0; $i < 4; $i++)
                        <div class="flex flex-col w-1/2 justify-center p-3 text-center">
                            <h3 class="text-grey-500 text-xl font-light uppercase">SCORE / MIN</h3>
                            <h2 class="text-grey-200 font-normal text-3xl tracking-tight">902</h2>
                            <small class="text-grey-400 text-base font-light tracking-tight">461h 16min</small>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection