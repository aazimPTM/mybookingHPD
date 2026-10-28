<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="View room availability — MyBooking HPD">
    <title>Room Calendar — MyBooking HPD</title>
    <link href="{{ asset('HPD Logo.png') }}" rel="icon" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="min-h-full bg-grid" style="background-color: #fafbff;">

    <div class="aurora-bg"></div>
    <div class="holo-grid"></div>

    <nav class="sticky top-0 z-50 border-b border-[#eef1f8] backdrop-blur-xl" style="background-color: rgba(255, 255, 255, 0.85);">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between gap-4">

                <a href="{{ route('login') }}" class="flex items-center gap-3 font-bold text-lg tracking-tight group">
                    <div class="relative">
                        <div class="absolute inset-0 bg-purple-500/30 rounded-xl blur-lg opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <img src="{{ asset('HPD Logo.png') }}" alt="HPD Logo"
                             class="relative w-11 h-9 object-contain transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <span class="text-[#0f1419]">MyBooking<span class="text-gradient-blue">HPD</span></span>
                </a>

                <div class="flex items-center gap-3">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-purple-50 border border-purple-200 text-xs font-bold text-purple-700">
                        <span class="relative flex h-1.5 w-1.5">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-purple-500 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-purple-500"></span>
                        </span>
                        Public View
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8">

        <div class="hero-banner animate-fade-in-up">
            <div class="hero-orb hero-orb-1"></div>
            <div class="hero-orb hero-orb-2"></div>

            <div class="hero-dot" style="width: 8px; height: 8px; top: 20%; left: 30%;"></div>
            <div class="hero-dot" style="width: 6px; height: 6px; top: 60%; left: 15%; animation-delay: 1s;"></div>
            <div class="hero-dot" style="width: 10px; height: 10px; top: 30%; right: 25%; animation-delay: 2s;"></div>

            <svg class="hero-sparkle" style="top: 15%; right: 40%; width: 16px; height: 16px;" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 0L14.5 9.5L24 12L14.5 14.5L12 24L9.5 14.5L0 12L9.5 9.5L12 0Z"/>
            </svg>

            <div class="grid grid-cols-1 lg:grid-cols-[1fr_auto] gap-6 items-center">
                <div class="hero-content">
                    <div class="hero-label">
                        <span class="h-1.5 w-1.5 rounded-full bg-white animate-pulse"></span>
                        MyBooking HPD · Public View
                    </div>

                    <h1 class="hero-title">Room Availability Calendar</h1>
                    <p class="hero-subtitle">
                        View real-time room availability without logging in. To make a booking, please login to your staff account.
                    </p>
                </div>

                <div class="hero-illustration">
                    <div class="hero-illustration-anim relative">
                        <div class="relative flex items-center justify-center" style="width: 180px; height: 180px;">
                            <div class="absolute inset-0 rounded-full"
                                 style="background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.25), rgba(255, 255, 255, 0.05));
                                        border: 2px solid rgba(255, 255, 255, 0.2);
                                        backdrop-filter: blur(12px);"></div>

                            <svg class="w-20 h-20 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5"/>
                            </svg>

                            <div class="absolute -top-2 -right-2 h-14 w-14 rounded-2xl flex items-center justify-center"
                                 style="background: linear-gradient(135deg, #fbbf24, #f59e0b);
                                        box-shadow: 0 8px 20px -8px rgba(245, 158, 11, 0.6);">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>

                            <div class="absolute -bottom-2 -left-2 h-12 w-12 rounded-2xl flex items-center justify-center"
                                 style="background: linear-gradient(135deg, #22d3ee, #06b6d4);
                                        box-shadow: 0 8px 20px -8px rgba(6, 182, 212, 0.6);">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-[1fr_380px] gap-6 items-start">

            <div class="modern-card overflow-hidden animate-fade-in-up animate-fade-in-up-delay-1">

                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 px-6 py-5 border-b border-[#eef1f8]"
                     style="background: linear-gradient(180deg, #fafbff 0%, #ffffff 100%);">
                    <div class="flex items-center gap-4">
                        <h2 id="current-month" class="text-xl font-extrabold text-[#0f1419] tracking-tight">Loading...</h2>
                        <div class="flex items-center gap-1.5">
                            <button type="button" id="today-btn" class="hidden md:inline-flex items-center gap-1.5 py-1.5 pl-2 pr-3.5 rounded-lg bg-white border border-[#e2e7f0] text-xs font-bold text-[#475569] transition-all duration-200 hover:bg-purple-50 hover:border-purple-500/40 hover:text-purple-700">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Today
                            </button>
                            <button type="button" id="prev-month" class="p-2 rounded-lg bg-white border border-[#e2e7f0] text-[#64748b] transition-all duration-200 hover:bg-purple-50 hover:border-purple-500/40 hover:text-purple-700">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </button>
                            <button type="button" id="next-month" class="p-2 rounded-lg bg-white border border-[#e2e7f0] text-[#64748b] transition-all duration-200 hover:bg-purple-50 hover:border-purple-500/40 hover:text-purple-700">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="hidden md:flex items-center gap-2">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-emerald-50 border border-emerald-200 text-xs font-bold text-emerald-700">
                            <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                            Has Booking
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-[#fafbff] border border-[#e2e7f0] text-xs font-bold text-[#64748b]">
                            <span class="h-2 w-2 rounded-full bg-[#cbd2e0]"></span>
                            Available
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-7 border-b border-[#eef1f8]" style="background: #fafbff;">
                    @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
                        <div class="px-3.5 py-3 flex items-center justify-center sm:justify-between border-r border-[#eef1f8] last:border-r-0">
                            <span class="hidden sm:inline text-xs font-bold text-[#94a3b8] uppercase tracking-widest">{{ $day }}</span>
                            <span class="sm:hidden text-xs font-bold text-[#94a3b8] uppercase">{{ substr($day, 0, 1) }}</span>
                        </div>
                    @endforeach
                </div>

                <div id="calendar-grid" class="grid grid-cols-7"></div>

                <div class="px-6 py-4 border-t border-[#eef1f8] text-xs text-[#94a3b8] font-medium flex items-center gap-2" style="background: #fafbff;">
                    <svg class="h-3.5 w-3.5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                    Click a date to view bookings
                </div>
            </div>

            <div class="space-y-4 animate-fade-in-up animate-fade-in-up-delay-2 lg:sticky lg:top-24">
                <div class="modern-card px-6 py-5">
                    <div class="flex items-center gap-3">
                        <div class="icon-container h-10 w-10" style="background: linear-gradient(135deg, rgba(124, 58, 237, 0.15), rgba(99, 102, 241, 0.08));">
                            <svg class="h-4 w-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5"/>
                            </svg>
                        </div>
                        <h3 id="selected-date-title" class="text-base font-bold text-[#0f1419]">Bookings on --</h3>
                    </div>
                </div>
                <div id="bookings-list" class="space-y-3 max-h-[600px] overflow-y-auto pr-1"></div>

                <div class="modern-card p-6 text-center" style="background: linear-gradient(135deg, rgba(124, 58, 237, 0.05), rgba(99, 102, 241, 0.03));">
                    <div class="inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-purple-500 to-indigo-500 mb-3 shadow-lg shadow-purple-500/30">
                        <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                        </svg>
                    </div>
                    <h4 class="text-base font-extrabold text-[#0f1419] mb-1">Want to book a room?</h4>
                    <p class="text-xs text-[#64748b] mb-5 font-medium">Login to your staff account to make a booking request.</p>
                    <a href="{{ route('login') }}" class="btn-modern btn-primary w-full">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/>
                        </svg>
                        Login Now
                    </a>
                </div>
            </div>
        </div>
    </main>

    <footer class="border-t border-[#eef1f8] py-6 mt-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-3">
            <div class="flex items-center gap-2.5 text-xs text-[#718096]">
                <div class="flex h-6 w-6 items-center justify-center rounded-lg bg-gradient-to-br from-purple-500/15 to-indigo-500/15 border border-purple-500/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-purple-600" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M2 3h20v4H2V3zm2 5v13h3V8H4zm6 0v13h4V8h-4zm7 0v13h3V8h-3z" />
                    </svg>
                </div>
                <span>&copy; {{ date('Y') }} MyBookingHPD · All rights reserved</span>
            </div>
            <div class="text-xs text-[#a0aec0]">
                Built with <span class="text-pink-500">♥</span> for Hospital Port Dickson
            </div>
        </div>
    </footer>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentDate = new Date();
        let selectedDate = new Date();
        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        function renderCalendar() {
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();
            document.getElementById('current-month').textContent = monthNames[month] + ' ' + year;

            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);
            const daysInMonth = lastDay.getDate();
            const startingDay = firstDay.getDay();
            const prevLastDay = new Date(year, month, 0).getDate();

            let html = '';
            let dayCount = 1;
            let nextMonthDay = 1;

            for (let i = 0; i < 42; i++) {
                if (i < startingDay) {
                    const day = prevLastDay - startingDay + i + 1;
                    html += `<div class="px-3.5 py-3 border-b border-r border-[#eef1f8] min-h-[80px] lg:min-h-[100px] flex flex-col items-center sm:items-start transition-all" style="background: #fafbff;">
                        <span class="text-xs font-semibold text-[#cbd2e0] flex items-center justify-center w-7 h-7 rounded-full">${day}</span>
                    </div>`;
                } else if (dayCount > daysInMonth) {
                    html += `<div class="px-3.5 py-3 border-b border-r border-[#eef1f8] min-h-[80px] lg:min-h-[100px] flex flex-col items-center sm:items-start transition-all" style="background: #fafbff;">
                        <span class="text-xs font-semibold text-[#cbd2e0] flex items-center justify-center w-7 h-7 rounded-full">${nextMonthDay}</span>
                    </div>`;
                    nextMonthDay++;
                } else {
                    const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(dayCount).padStart(2, '0')}`;
                    const isToday = isTodayDate(year, month, dayCount);
                    const isSelected = isSelectedDate(year, month, dayCount);

                    let cellClasses = 'px-3.5 py-3 border-b border-r border-[#eef1f8] min-h-[80px] lg:min-h-[100px] flex flex-col items-center sm:items-start transition-all duration-200 cursor-pointer hover:bg-purple-50/50 relative bg-white ';
                    let numberClasses = 'text-xs font-bold flex items-center justify-center w-7 h-7 rounded-full ';

                    if (isSelected) numberClasses += 'bg-gradient-to-br from-purple-600 to-indigo-500 text-white shadow-lg shadow-purple-600/40 ';
                    else if (isToday) numberClasses += 'bg-purple-100 text-purple-700 ';
                    else numberClasses += 'text-[#334155] ';

                    html += `<div class="${cellClasses}" data-date="${dateStr}" data-day="${dayCount}" onclick="selectDate('${dateStr}')">
                        <div class="flex flex-col items-center sm:items-start w-full gap-1.5">
                            <span class="${numberClasses}">${dayCount}</span>
                            <span class="booking-label hidden lg:block text-[11px] font-semibold text-[#94a3b8] leading-tight text-left w-full truncate"></span>
                            <span class="booking-indicator lg:hidden h-1.5 w-1.5 rounded-full hidden"></span>
                        </div>
                    </div>`;
                    dayCount++;
                }
            }

            document.getElementById('calendar-grid').innerHTML = html;
            loadMonthBookings(year, month);
        }

        function isTodayDate(year, month, day) {
            const today = new Date();
            return today.getFullYear() === year && today.getMonth() === month && today.getDate() === day;
        }
        function isSelectedDate(year, month, day) {
            return selectedDate.getFullYear() === year && selectedDate.getMonth() === month && selectedDate.getDate() === day;
        }

        function loadMonthBookings(year, month) {
            const startDate = `${year}-${String(month + 1).padStart(2, '0')}-01`;
            const lastDay = new Date(year, month + 1, 0).getDate();
            const endDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(lastDay).padStart(2, '0')}`;

            fetch(`/guest-calendar/bookings?start_date=${startDate}&end_date=${endDate}`)
                .then(res => res.json())
                .then(data => {
                    if (data.dates) {
                        Object.keys(data.dates).forEach(dateStr => {
                            markDateAsBooked(dateStr, data.dates[dateStr]);
                        });
                    }
                })
                .catch(err => console.log('Error:', err));
        }

        function markDateAsBooked(dateStr, bookings) {
            const dayEl = document.querySelector(`[data-date="${dateStr}"]`);
            if (!dayEl) return;
            const numberEl = dayEl.querySelector('span:first-child');
            if (numberEl) {
                numberEl.classList.remove('text-[#334155]', 'bg-purple-100', 'text-purple-700');
                numberEl.classList.add('bg-gradient-to-br', 'from-emerald-500', 'to-emerald-600', 'text-white', 'shadow-lg', 'shadow-emerald-500/40');
            }
            const labelEl = dayEl.querySelector('.booking-label');
            if (labelEl && bookings && bookings.length > 0) {
                labelEl.textContent = bookings[0].room_name;
                labelEl.classList.remove('text-[#94a3b8]');
                labelEl.classList.add('text-emerald-600');
            }
            const indicator = dayEl.querySelector('.booking-indicator');
            if (indicator) {
                indicator.classList.remove('hidden');
                indicator.classList.add('bg-emerald-500');
            }
        }

        window.selectDate = function(dateStr) {
            selectedDate = new Date(dateStr + 'T00:00:00');
            renderCalendar();
            loadBookingsForDate(dateStr);
        };

        function loadBookingsForDate(dateStr) {
            const dateObj = new Date(dateStr + 'T00:00:00');
            const day = dateObj.getDate();
            const month = monthNames[dateObj.getMonth()];
            const year = dateObj.getFullYear();

            document.getElementById('selected-date-title').textContent = `Bookings on ${day} ${month} ${year}`;
            document.getElementById('bookings-list').innerHTML = `
                <div class="modern-card p-8 text-center">
                    <div class="animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-purple-500 mx-auto"></div>
                </div>`;

            fetch(`/guest-calendar/bookings?date=${dateStr}`)
                .then(res => res.json())
                .then(data => renderBookingsList(data.bookings, dateStr))
                .catch(err => renderBookingsList([], dateStr));
        }

        function renderBookingsList(bookings, dateStr) {
            const container = document.getElementById('bookings-list');
            if (!bookings || bookings.length === 0) {
                container.innerHTML = `
                    <div class="modern-card p-8 text-center">
                        <div class="inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 border border-emerald-200 mb-3">
                            <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <p class="text-[#334155] text-sm font-bold">Fully Available</p>
                        <p class="text-[#94a3b8] text-xs mt-1 font-medium">No bookings on this date. All rooms are available.</p>
                    </div>`;
                return;
            }

            let html = '';
            bookings.forEach(booking => {
                const badge = booking.status === 'approved'
                    ? '<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-bold bg-red-50 text-red-700 border border-red-200"><span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>Approved</span>'
                    : '<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-200"><span class="h-1.5 w-1.5 rounded-full bg-amber-500 animate-pulse"></span>Pending</span>';

                html += `
                    <div class="modern-card p-5 group">
                        <div class="flex items-start justify-between gap-3 mb-3">
                            <div class="flex items-start gap-2 min-w-0">
                                <div class="icon-container h-8 w-8 flex-shrink-0" style="background: linear-gradient(135deg, rgba(124, 58, 237, 0.15), rgba(99, 102, 241, 0.08));">
                                    <svg class="h-3.5 w-3.5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-sm font-bold text-[#0f1419] truncate">${booking.room_name}</p>
                                    ${booking.room_building ? `<p class="text-xs text-[#94a3b8] truncate font-medium">${booking.room_building}</p>` : ''}
                                </div>
                            </div>
                            ${badge}
                        </div>

                        <div class="flex items-center gap-2 mb-3 text-[#334155] text-sm bg-[#fafbff] rounded-lg px-3 py-2 border border-[#eef1f8]">
                            <svg class="h-4 w-4 text-purple-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="font-bold text-xs">${booking.start_time} – ${booking.end_time}</span>
                        </div>

                        ${booking.purpose ? `<div class="mb-3"><p class="text-[10px] uppercase tracking-widest text-[#94a3b8] font-bold mb-1">Purpose</p><p class="text-sm font-semibold text-[#334155]">${booking.purpose}</p></div>` : ''}
                    </div>
                `;
            });
            container.innerHTML = html;
        }

        document.getElementById('prev-month').addEventListener('click', () => { currentDate.setMonth(currentDate.getMonth() - 1); renderCalendar(); });
        document.getElementById('next-month').addEventListener('click', () => { currentDate.setMonth(currentDate.getMonth() + 1); renderCalendar(); });
        document.getElementById('today-btn').addEventListener('click', () => {
            currentDate = new Date();
            const todayStr = `${currentDate.getFullYear()}-${String(currentDate.getMonth() + 1).padStart(2, '0')}-${String(currentDate.getDate()).padStart(2, '0')}`;
            selectDate(todayStr);
        });

        renderCalendar();
        const today = new Date();
        const todayStr = `${today.getFullYear()}-${String(today.getMonth() + 1).padStart(2, '0')}-${String(today.getDate()).padStart(2, '0')}`;
        selectDate(todayStr);
    });
    </script>
</body>
</html>
