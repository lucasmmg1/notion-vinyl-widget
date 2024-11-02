print("Bem-vindo ao notion-vinyl-widget! Seu widget responsável por organizar seu biblioteca de discos de vinil!\n")
print("Para começar, digite uma das opções abaixo:")

print("1 - Adicionar um disco de vinil\n")

val = input("")

match val:
    case "1":
        cover = input("\nPrimeiro, digite a URL da capa do disco de vinil: ")
        album_name = input("Depois, digite o nome do album: ")
        artist = input("Agora, digite o nome do artista: ")
        year = input("Por fim, digite o ano de lançamento: ")

        f = open(f"{album_name.lower().replace(' ', '')}.json", "x")
        f.write(f'{{"cover": "{cover}", "album_name": "{album_name}", "artist": "{artist}", "year": "{year}"}}')
        f.close()
        exit()
    case _:
        print("Opção inválida")
