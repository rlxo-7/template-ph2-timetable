<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>わたしの時間割 | POSSE大学</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-800">
	<header class="bg-[#1f3a5f] text-white">
		<div class="mx-auto max-w-5xl px-4 py-4">
			<p class="text-xs tracking-widest text-blue-100">POSSE大学 学務ポータル</p>
			<h1 class="mt-1 text-xl font-bold">わたしの時間割</h1>
		</div>
	</header>

	<main class="mx-auto max-w-5xl px-4 py-6">
		<div class="mb-4 flex flex-wrap items-center justify-between gap-3">
			<h2 class="text-lg font-bold">登録した授業</h2>
			<a href="{{ url('/entries/create') }}" class="rounded-lg bg-[#1f3a5f] px-4 py-2 text-sm font-medium text-white hover:bg-slate-700">授業を登録する</a>
		</div>

		<section class="overflow-x-auto rounded-lg border border-slate-200 bg-white">
			@if ($entries->isEmpty())
				<p class="px-5 py-8 text-center text-sm text-slate-600">まだ授業が登録されていません。</p>
			@else
				<table class="w-full text-left text-sm text-slate-700">
					<thead class="bg-slate-50 text-slate-600">
						<tr>
							<th class="whitespace-nowrap px-4 py-3 font-medium">曜日</th>
							<th class="whitespace-nowrap px-4 py-3 font-medium">時限</th>
							<th class="whitespace-nowrap px-4 py-3 font-medium">授業名</th>
							<th class="whitespace-nowrap px-4 py-3 font-medium">教室</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($entries as $entry)
							<tr class="border-t border-slate-200">
								<td class="whitespace-nowrap px-4 py-3">{{ ['月', '火', '水', '木', '金'][$entry->day - 1] }}</td>
								<td class="whitespace-nowrap px-4 py-3">{{ $entry->period }}限</td>
								<td class="px-4 py-3">{{ $entry->title }}</td>
								<td class="whitespace-nowrap px-4 py-3">{{ $entry->room ?: '—' }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@endif
		</section>
	</main>

	<footer class="mx-auto max-w-5xl px-4 pb-8 text-xs text-slate-500">POSSE大学 学務課</footer>
</body>
</html>
