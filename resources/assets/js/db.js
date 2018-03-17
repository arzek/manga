export class LocalStore {
	static init() {
		let db;
		let request = window.indexedDB.open("main", 1);

		request.onsuccess = (event) => {
			db = request.result;
			window.db = db;
		};

		request.onupgradeneeded = function (event) {
			let db = event.target.result;
			let objectStore = db.createObjectStore("history", { keyPath: "id", autoIncrement: true });
			objectStore.createIndex("manga_id", "manga_id", { unique: false });
			objectStore.createIndex("manga", "manga", { unique: false });
			objectStore.createIndex("chapters", "chapters", { unique: false });
			
			window.db = db;
		}
	}
	static addManga(item) {
		let objectStore = db.transaction(["history"], "readwrite")
			.objectStore("history");
		let getAllRequest = objectStore.getAll();

		getAllRequest.onsuccess = () => {
			let data = getAllRequest.result;
			let id = Number(item.manga.id);
	
			if (!data.length) {
				objectStore.add({ 
					manga_id: id, 
					manga: item.manga, 
					chapters: item.chapters
				});
			} else {
				let last_item = data[data.length - 1];
				if (last_item.manga_id != id) {
					objectStore.add({ 
						manga_id: id, 
						manga: item.manga, 
						chapters: item.chapters
					});
				}
			}


		}
	}
}

