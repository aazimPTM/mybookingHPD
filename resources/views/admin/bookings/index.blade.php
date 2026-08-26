@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')

    {{-- ── Page Header ── --}}
    <div class="mb-8">
        <p class="text-xs font-semibold text-amber-400 uppercase tracking-widest mb-1">Admin Panel</p>
        <h1 class="text-2xl font-bold text-white">Manage Bookings</h1>
    </div>

    {{-- ── Stats Row ── --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">

        {{-- Pending --}}
        <div class="relative overflow-hidden bg-slate-800/50 border border-amber-500/25 rounded-2xl p-5 backdrop-blur-sm">
            <div class="absolute top-0 right-0 h-full w-1/3 bg-gradient-to-l from-amber-500/5 to-transparent pointer-events-none"></div>
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Pending Approval</p>
                    <p class="text-4xl font-bold text-amber-400 mt-2 tabular-nums">{{ $pendingCount }}</p>
                    <p class="text-xs text-slate-500 mt-1">bookings</p>
                </div>
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-500/15 flex-shrink-0">
                    <svg class="h-5 w-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            @if($pendingCount > 0)
                <div class="mt-3 flex items-center gap-1.5">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-amber-400"></span>
                    </span>
                    <span class="text-xs text-amber-400">Action Required</span>
                </div>
            @endif
        </div>

        {{-- Approved --}}
        <div class="relative overflow-hidden bg-slate-800/50 border border-emerald-500/25 rounded-2xl p-5 backdrop-blur-sm">
            <div class="absolute top-0 right-0 h-full w-1/3 bg-gradient-to-l from-emerald-500/5 to-transparent pointer-events-none"></div>
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Approved</p>
                    <p class="text-4xl font-bold text-emerald-400 mt-2 tabular-nums">{{ $approvedCount }}</p>
                    <p class="text-xs text-slate-500 mt-1">bookings</p>
                </div>
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/15 flex-shrink-0">
                    <svg class="h-5 w-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Rejected --}}
        <div class="relative overflow-hidden bg-slate-800/50 border border-red-500/25 rounded-2xl p-5 backdrop-blur-sm">
            <div class="absolute top-0 right-0 h-full w-1/3 bg-gradient-to-l from-red-500/5 to-transparent pointer-events-none"></div>
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Rejected</p>
                    <p class="text-4xl font-bold text-red-400 mt-2 tabular-nums">{{ $rejectedCount }}</p>
                    <p class="text-xs text-slate-500 mt-1">bookings</p>
                </div>
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-500/15 flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- ── Filter Tabs ── --}}
    <div class="flex items-center gap-1.5 mb-6 p-1 bg-slate-800/50 border border-slate-700/50 rounded-xl w-full sm:w-fit overflow-x-auto [scrollbar-width:none] [-ms-overflow-style:none] [&::-webkit-scrollbar]:hidden">
        @foreach(['all' => 'All', 'pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected'] as $key => $label)
            <a href="{{ $key == 'all' ? route('admin.bookings.index') : route('admin.bookings.index', ['status' => $key]) }}"
               class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-150 whitespace-nowrap flex-shrink-0
                      {{ $status === $key
                          ? 'bg-slate-700 text-white shadow-sm'
                          : 'text-slate-500 hover:text-slate-300 hover:bg-slate-700/50' }}">
                {{ $label }}
                @if($key === 'pending' && $pendingCount > 0)
                    <span class="ml-1.5 inline-flex items-center justify-center h-4 w-4 rounded-full text-xs font-bold bg-amber-500/30 text-amber-400">
                        {{ $pendingCount }}
                    </span>
                @endif
            </a>
        @endforeach
    </div>


    {{-- ── Bookings Table ── --}}
    <div class="bg-slate-800/40 border border-slate-700/50 rounded-2xl overflow-hidden backdrop-blur-sm">

        @if($bookings->isEmpty())
            <div class="p-16 text-center">
                <div class="inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-700/60 mb-4">
                    <svg class="h-7 w-7 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <p class="text-slate-400 font-medium mb-1">No booking records found</p>
            </div>
        @else
            {{-- Table info bar --}}
            <div class="px-6 py-4 border-b border-slate-700/50 flex items-center justify-between">
                <p class="text-sm font-medium text-slate-300">
                    Bookings History
                    <span class="ml-2 px-2 py-0.5 rounded-full text-xs bg-slate-700 text-slate-400">{{ $bookings->total() }} total</span>
                </p>
            </div>

            <div class="overflow-x-auto overflow-y-auto h-[500px]">
                <table class="w-full text-sm">
                    <thead class="sticky top-0 bg-slate-900 z-10">
                        <tr class="border-b border-slate-700/40">
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">#</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">User</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Booking Space</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Date & Time</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Booking Purpose</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/30">
                        @foreach($bookings as $booking)
                            <tr class="group hover:bg-slate-700/20 transition-all duration-150 {{ $booking->isPending() ? 'bg-amber-500/[0.03]' : '' }}">

                                {{-- ID --}}
                                <td class="px-6 py-4">
                                    <span class="text-xs font-mono text-slate-600 bg-slate-700/40 px-1.5 py-0.5 rounded">#{{ $booking->id }}</span>
                                </td>

                                {{-- User --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2.5">
                                        <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-slate-700 text-xs font-bold text-slate-300 uppercase ring-1 ring-slate-600">
                                            {{ substr($booking->user->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <p class="font-medium text-slate-200">{{ $booking->user->name }}</p>
                                            <p class="text-xs text-slate-500 truncate max-w-[160px]">{{ $booking->user->email }}</p>
                                        </div>
                                    </div>
                                </td>

                                {{-- Room --}}
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="font-medium text-white">{{ $booking->room->name }}</p>
                                        @if($booking->room->building)
                                            <p class="text-xs text-slate-500 mt-0.5">{{ $booking->room->building }}</p>
                                        @endif
                                    </div>
                                </td>

                                {{-- Date & Time --}}
                                <td class="px-6 py-4">
                                    <p class="text-slate-300 whitespace-nowrap">{{ $booking->start_time->format('j M Y') }}</p>
                                    <div class="inline-flex items-center gap-1 mt-1 px-2 py-0.5 rounded-md bg-slate-700/50 text-xs text-slate-400">
                                        <svg class="h-3 w-3 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        {{ $booking->start_time->format('g:i A') }} – {{ $booking->end_time->format('g:i A') }}
                                    </div>
                                </td>

                                {{-- Purpose --}}
                                <td class="px-6 py-4 max-w-[160px]">
                                    <p class="text-slate-400 truncate" title="{{ $booking->purpose }}">{{ $booking->purpose ?? '—' }}</p>
                                </td>

                                {{-- Status --}}
                                <td class="px-6 py-4">
                                    <x-badge :status="$booking->status" />
                                    @if($booking->notes)
                                        <p class="text-xs text-slate-600 mt-1.5 max-w-[140px] truncate" title="{{ $booking->notes }}">
                                            {{ $booking->notes }}
                                        </p>
                                    @endif
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4">
                                        <div class="flex flex-col gap-1.5 min-w-[90px]">
                                            {{-- View Button --}}
                                            <button type="button"
                                                    onclick="document.getElementById('view-modal-{{ $booking->id }}').classList.remove('hidden')"
                                                    class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 rounded-lg
                                                           bg-blue-600/15 hover:bg-blue-600/30
                                                           border border-blue-600/25 hover:border-blue-500/40
                                                           text-xs font-semibold text-blue-300 hover:text-blue-200
                                                           transition-all cursor-pointer">
                                                <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                    <circle cx="12" cy="12" r="3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"/>
                                                </svg>
                                                View
                                            </button>

                                            @if($booking->isPending())
                                                {{-- Approve Button --}}
                                                <button type="button"
                                                        onclick="document.getElementById('approve-modal-{{ $booking->id }}').classList.remove('hidden')"
                                                        class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 rounded-lg
                                                               bg-emerald-600/15 hover:bg-emerald-600/30
                                                               border border-emerald-600/25 hover:border-emerald-500/40
                                                               text-xs font-semibold text-emerald-300 hover:text-emerald-200
                                                               transition-all cursor-pointer">
                                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                                    </svg>
                                                    Approve
                                                </button>

                                                {{-- Reject Button --}}
                                                <button type="button"
                                                        onclick="document.getElementById('reject-modal-{{ $booking->id }}').classList.remove('hidden')"
                                                        class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 rounded-lg
                                                               bg-red-600/15 hover:bg-red-600/30
                                                               border border-red-600/25 hover:border-red-500/40
                                                               text-xs font-semibold text-red-400 hover:text-red-300
                                                               transition-all cursor-pointer">
                                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                                                    </svg>
                                                    Reject
                                                </button>
                                            @endif
                                        </div>

                                        {{-- ── View Modal ── --}}
                                        <div id="view-modal-{{ $booking->id }}"
                                             class="hidden fixed inset-0 z-[100] flex items-center justify-center bg-slate-950/75 backdrop-blur-sm text-left"
                                             onclick="if(event.target===this) this.classList.add('hidden')">
                                            <div class="bg-slate-800 border border-slate-700/60 rounded-2xl p-6 shadow-2xl max-w-xl w-full mx-4">

                                                <div class="flex items-center gap-3 mb-4 justify-between">
                                                    <h3 class="text-base font-bold text-white">Booking Details</h3>
                                                    <x-badge :status="$booking->status" />
                                                </div>

                                                <hr class="my-5 border-slate-700/50">

                                                <div class="my-5">
                                                    <strong>Booked by : </strong>
                                                    <p class="text-xs text-slate-500">{{ $booking->user->name }} - {{ $booking->user->email }}</p>
                                                </div>

                                                <strong>Booked for : </strong>
                                                <p class="text-slate-300 whitespace-nowrap">{{ $booking->start_time->format('j M Y') }}</p>
                                                <div class="inline-flex items-center gap-1 mt-1 px-2 py-0.5 rounded-md bg-slate-700/50 text-xs text-slate-400">
                                                    <svg class="h-3 w-3 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    {{ $booking->start_time->format('g:i A') }} – {{ $booking->end_time->format('g:i A') }}
                                                </div>

                                                <p class="text-sm text-slate-400 my-5">
                                                    <strong class="text-slate-200">Booking Purpose : </strong><br>
                                                    {{ $booking->purpose ?? '—' }}
                                                </p>

                                                @if($booking->notes)
                                                    <p class="text-sm text-slate-400 my-5">
                                                        <strong class="text-slate-200">Notes : </strong><br>
                                                        {{ $booking->notes }}
                                                    </p>
                                                @endif

                                                <p class="text-sm text-slate-400 mt-10 text-right">
                                                    Booked at : {{ $booking->created_at->format('j M Y, g:i A') }}
                                                </p>
                                            </div>
                                        </div>

                                        {{-- ── Approve Modal ── --}}
                                        <div id="approve-modal-{{ $booking->id }}"
                                             class="hidden fixed inset-0 z-[100] flex items-center justify-center bg-slate-950/75 backdrop-blur-sm text-left"
                                             onclick="if(event.target===this) this.classList.add('hidden')">
                                            <div class="bg-slate-800 border border-slate-700/60 rounded-2xl p-6 shadow-2xl max-w-xl w-full mx-4">

                                                <div class="flex items-center gap-3 mb-4">
                                                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-500/15">
                                                        <svg class="h-5 w-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <h3 class="text-base font-bold text-white">Approve Booking</h3>
                                                        <p class="text-xs text-slate-500">{{ $booking->user->name }} - {{ $booking->user->email }}</p>
                                                    </div>
                                                </div>

                                                <hr class="my-5 border-slate-700/50">

                                                <p class="text-sm text-slate-400 mb-5">
                                                    Approve booking of <strong class="text-slate-200">{{ $booking->room->name }}</strong> by
                                                    <strong class="text-slate-200">{{ $booking->user->name }}</strong>. <br>User will be notified.
                                                </p>

                                                <form action="{{ route('admin.bookings.status', $booking) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="approved">

                                                    <div class="mb-5">
                                                        <label class="block text-sm font-medium text-slate-300 mb-1.5">
                                                            Approval Notes
                                                            <span class="text-slate-500 font-normal">(Optional)</span>
                                                        </label>
                                                        <input type="text" name="notes"
                                                               class="w-full rounded-xl border border-slate-700 focus:border-emerald-500
                                                                      bg-slate-900/60 px-4 py-3 text-sm text-white placeholder:text-slate-500
                                                                      transition-colors outline-none"
                                                               style="box-shadow: none;"
                                                               placeholder="Cth: Pastikan semua suis ditutup sebelum keluar.">
                                                    </div>

                                                    <div class="flex justify-end gap-2">
                                                        <button type="button"
                                                                onclick="document.getElementById('approve-modal-{{ $booking->id }}').classList.add('hidden')"
                                                                class="px-4 py-2 rounded-xl text-sm font-medium text-slate-400 hover:text-white hover:bg-slate-700/60 transition-all">
                                                            Close
                                                        </button>
                                                        <button type="submit"
                                                                class="px-5 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-sm font-semibold text-white transition-all shadow-lg shadow-emerald-600/20">
                                                            Approve Booking
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        {{-- ── Reject Modal ── --}}
                                        <div id="reject-modal-{{ $booking->id }}"
                                             class="hidden fixed inset-0 z-[100] flex items-center justify-center bg-slate-950/75 backdrop-blur-sm text-left"
                                             onclick="if(event.target===this) this.classList.add('hidden')">
                                            <div class="bg-slate-800 border border-slate-700/60 rounded-2xl p-6 shadow-2xl max-w-xl w-full mx-4">

                                                <div class="flex items-center gap-3 mb-4">
                                                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-500/15">
                                                        <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <h3 class="text-base font-bold text-white">Reject Booking</h3>
                                                        <p class="text-xs text-slate-500">{{ $booking->user->name }} - {{ $booking->user->email }}</p>
                                                    </div>
                                                </div>

                                                <hr class="my-5 border-slate-700/50">

                                                <p class="text-sm text-slate-400 mb-5">
                                                    Please provide reason of rejection (Will be visible to user)
                                                </p>

                                                <form action="{{ route('admin.bookings.status', $booking) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="rejected">

                                                    <div class="mb-5">
                                                        <label class="block text-sm font-medium text-slate-300 mb-1.5">
                                                            Rejection Reason
                                                            <span class="text-red-400">*</span>
                                                        </label>
                                                        <textarea name="notes" required rows="3"
                                                                  class="w-full rounded-xl border border-slate-700 focus:border-red-500
                                                                         bg-slate-900/60 px-4 py-3 text-sm text-white placeholder:text-slate-500
                                                                         transition-colors outline-none resize-none"
                                                                  placeholder="Cth: Ruangan sudah ditempah untuk program dalaman."></textarea>
                                                    </div>

                                                    <div class="flex justify-end gap-2">
                                                        <button type="button"
                                                                onclick="document.getElementById('reject-modal-{{ $booking->id }}').classList.add('hidden')"
                                                                class="px-4 py-2 rounded-xl text-sm font-medium text-slate-400 hover:text-white hover:bg-slate-700/60 transition-all">
                                                            Close
                                                        </button>
                                                        <button type="submit"
                                                                class="px-5 py-2 rounded-xl bg-red-600 hover:bg-red-500 text-sm font-semibold text-white transition-all shadow-lg shadow-red-600/20">
                                                            Reject Booking
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($bookings->hasPages())
                <div class="px-6 py-4 border-t border-slate-700/50">
                    {{ $bookings->links() }}
                </div>
            @endif
        @endif
    </div>

@endsection
