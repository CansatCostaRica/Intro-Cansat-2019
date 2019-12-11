from tkinter import *
from tkinter import ttk
import variables
class Aplicacion():
    def __init__(self):
        raiz = Tk()
        raiz.geometry('400x200')
        raiz.configure(bg = 'beige')
        raiz.title('Aplicación')
        ttk.Button(raiz, text='Salir', 
                   command=raiz.destroy).pack(side=BOTTOM)

        self.combo = ttk.Combobox(raiz,state="readonly")
        self.combo.pack(side=TOP)
        self.combo['values']=variables.cansats
        ttk.Button(raiz,text="Configuracion",command=self.configuracion).pack(side=BOTTOM)
        ttk.Button(raiz,text='Agregar').pack(side=BOTTOM)
        ttk.Button(raiz,text='Conectar').pack(side=BOTTOM)
        raiz.mainloop()

    def configuracion(self):
        second=Toplevel()
        second.geometry('400x200')
        Label(second,text='Nombre').pack(side=TOP)
        self.entry=ttk.Entry(second)
        self.entry.pack(side=TOP)
        self.label=ttk.Button(second,text="agregar",command=self.agregar).pack(side=BOTTOM)
        ttk.Button(second,text='Limpiar lista',command=self.limpiar).pack(side=BOTTOM)
        ttk.Button(second,text='Eliminar',command=self.eliminar).pack(side=BOTTOM)

        
    def agregar(self):
        cansat=self.entry.get()
        variables.cansats.append(cansat)
        self.refrescar()

    def refrescar(self):
        self.combo['values']=variables.cansats

    def eliminar(self):
        variables.cansats.remove(self.entry.get())
        self.refrescar()
        
    def limpiar(self):
        variables.cansats.clear()
        self.refrescar()

def main():
    mi_app = Aplicacion()
    return 0

if __name__ == '__main__':
    main()
